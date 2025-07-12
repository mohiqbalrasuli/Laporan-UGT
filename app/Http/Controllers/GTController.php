<?php

namespace App\Http\Controllers;

use App\Mail\AktivasiGT;
use App\Models\AksesFormModel;
use App\Models\GTModel;
use App\Models\LaporanGTModel;
use App\Models\MadrasahModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanGTExport;
use Barryvdh\DomPDF\Facade\Pdf;
use ZipArchive;

class GTController extends Controller
{
    public function index()
    {
        $gt = User::with(['gt.madrasah', 'gt.pjgt'])
            ->where('role', 'GT')
            ->where('status', 'aktif')
            ->get();
        $madrasah = MadrasahModel::all();
        $pjgt = User::where('role', 'PJGT')->with('pjgt')->where('status', 'aktif')->get();
        return view('admin.data-GT.data-GT', compact('gt', 'madrasah', 'pjgt'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'GT', // harus sama dengan enum
            'status' => 'aktif',
        ]);

        GTModel::create([
            'user_id' => $user->id,
            'alamat' => $request->alamat,
            'status_tugas' => $request->status_tugas,
            'asal_kelas' => $request->asal_kelas,
            'madrasah_id' => $request->madrasah_id ?? null,
            'pjgt_id' => $request->pjgt_id ?? null,
        ]);

        return redirect()
            ->back()
            ->with('success', $user->name . ' berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $gt = User::findOrFail($id);
        $gt->name = $request->name;
        $gt->save();

        $gtModel = GTModel::where('user_id', $id)->first();
        if ($gtModel) {
            $gtModel->alamat = $request->alamat;
            $gtModel->status_tugas = $request->status_tugas;
            $gtModel->asal_kelas = $request->asal_kelas;
            if (Auth::user()->role === 'admin') {
                $gtModel->madrasah_id = $request->madrasah_id ?? null;
                $gtModel->pjgt_id = $request->pjgt_id ?? null;
            }
            $gtModel->save();
        }

        if(Auth::user()->role=='admin'){
        return redirect()
            ->back()
            ->with('success', 'Berhasil mengupdate GT ' . $gt->name);
        }elseif(Auth::user()->role == 'GT'){
        return redirect()
            ->back()
            ->with('success', 'Data Anda Berhasil Diupdate');
        }
    }
    public function nonaktif(Request $request, $id)
    {
        $gt = User::findOrFail($id);
        $gt->status = 'tidak_aktif'; // Ubah status menjadi tidak aktif
        $gt->save();

        return redirect()
            ->back()
            ->with('success', $gt->name . ' berhasil dinonaktifkan');
    }

    public function delete($id)
    {
        $gt = User::findOrFail($id);
        $gt->delete();
        return redirect()
            ->back()
            ->with('success', $gt->name . ' berhasil dihapus');
    }

    public function validasi()
    {
        $gt = User::where('role', 'GT')->where('status', 'tidak_aktif')->get();
        return view('admin.data-GT.validasi-GT', compact('gt'));
    }
    public function validasi_aktif($id)
    {
        $gt = User::findOrFail($id);
        $gt->status = 'aktif'; // Ubah status menjadi aktif
        $gt->save();

        if ($gt->email) {
            Mail::to($gt->email)->send(new AktivasiGT($gt));
        }

        return redirect()
            ->back()
            ->with('success', $gt->name . ' berhasil diaktifkan');
    }
    public function data_laporan()
    {
        $laporan_gt = LaporanGTModel::with(['gt.user', 'gt.madrasah', 'gt.pjgt.user'])
            ->get()
            ->map(function ($laporan_gt) {
                $laporan_gt->guru_kelas = json_decode($laporan_gt->guru_kelas, true) ?? [];
                $laporan_gt->jenis_kelamin_murid = json_decode($laporan_gt->jenis_kelamin_murid, true) ?? [];
                $laporan_gt->alasan_tidak_masuk = json_decode($laporan_gt->alasan_tidak_masuk, true) ?? [];
                $laporan_gt->kegiatan_gt_Diluar_kelas = json_decode($laporan_gt->kegiatan_gt_Diluar_kelas, true) ?? [];
                return $laporan_gt;
            });
            $layout = match (Auth::user()->role) {
            'admin' => 'admin.layout.template_admin',
            'pengurus' => 'pengurus.layout.template_pengurus',
            default => 'layouts.default', // fallback layout
            };
        return view('admin.data-GT.data-laporan-gt', compact('laporan_gt','layout'));
    }

    public function profile()
    {
        $gt = User::with(['gt.madrasah', 'gt.pjgt'])
            ->where('role', 'GT')
            ->where('id', Auth::user()->id)
            ->where('status', 'aktif')
            ->first();
        return view('GT.profile', compact('gt'));
    }

    public function input_laporan()
    {
        $user = Auth::user();
        $today = Carbon::today();

        $mulai = AksesFormModel::latest()->value('tanggal_mulai_gt');
        $akhir = AksesFormModel::latest()->value('tanggal_akhir_gt');

        $dalamRentang = false;
        if ($mulai && $akhir) {
            $dalamRentang = $today->between(Carbon::parse($mulai), Carbon::parse($akhir));
        }

        // Cek apakah user sudah pernah mengisi laporan bulan ini
        // Ambil pjgt_id berdasarkan user yang login
        $gt = DB::table('table_gt')->where('user_id', $user->id)->first();

        $sudahLapor = false;
        if ($gt) {
            $sudahLapor = DB::table('table_laporan_gt')->where('gt_id', $gt->id)->whereMonth('created_at', $today->month)->whereYear('created_at', $today->year)->exists();
        }
        return view('GT.input-laporan-GT', compact('user', 'dalamRentang', 'sudahLapor'));
    }

    public function laporan_store(Request $request)
    {
        try {
            $user = Auth::user();
            $gt = GTModel::where('user_id', $user->id)->first();
            if (!$gt) {
                return redirect()->back()->with('error', 'Data GT tidak ditemukan');
            }
            $guru_kelas = $request->input('guru_kelas', []);
            $jenis_kelamin_murid = $request->input('jenis_kelamin_murid', []);
            $alasan_tidak_masuk = $request->input('alasan_tidak_masuk', []);
            $kegiatan_gt_Diluar_kelas = $request->input('kegiatan_gt_Diluar_kelas', []);

            $request->validate([
                'laporan_ke' => 'required|integer',
                'bulan_tahun' => 'required|string',
                'wali_kelas' => 'required|string',
                'guru_kelas' => 'array',
                'guru_fan' => 'required|string',
                'jenis_kelamin_murid' => 'array',
                'jumlah_mengajar_satu_minggu' => 'required|integer',
                'jumlah_mengajar_satu_bulan' => 'required|integer',
                'alasan_tidak_masuk' => 'array',
                'jumlah_hari_sakit' => 'nullable|integer',
                'jumlah_hari_pulang' => 'nullable|integer',
                'jumlah_alasan_lain' => 'nullable|integer',
                'kegiatan_gt_Diluar_kelas' => 'array',
                'interaksi_dengan_pjgt' => 'required|string|in:jarang,sering,tidak pernah',
                'interaksi_dengan_kepmad' => 'required|string|in:jarang,sering,tidak pernah',
                'interaksi_dengan_guru' => 'required|string|in:jarang,sering,tidak pernah',
                'bisyaroh_bulan_ini' => 'required|in:ya,tidak',
                'bisyaroh_bulan_ini_sebanyak' => 'nullable|numeric|min:0|required_if:bisyaroh_bulan_ini,ya',
                'kendala_bulan_ini' => 'required|string',
                'langkah_pemecahan_kendala' => 'required|string',
                'tugas_dari_km_pjgt' => 'required|string',
                'tugas_belum_terlaksana' => 'required|string',
                'usulan' => 'required|string',
                'tanggal_laporan' => 'required|string',
            ]);

            $laporan = [
                'gt_id' => $gt->id,
                'laporan_ke' => $request->laporan_ke,
                'bulan_tahun' => $request->bulan_tahun,
                'wali_kelas' => $request->wali_kelas,
                'guru_kelas' => json_encode($guru_kelas),
                'guru_fan' => $request->guru_fan,
                'jenis_kelamin_murid' => json_encode($jenis_kelamin_murid),
                'jumlah_mengajar_satu_minggu' => $request->jumlah_mengajar_satu_minggu,
                'jumlah_mengajar_satu_bulan' => $request->jumlah_mengajar_satu_bulan,
                'alasan_tidak_masuk' => json_encode($alasan_tidak_masuk),
                'jumlah_hari_sakit' => $request->jumlah_hari_sakit,
                'jumlah_hari_pulang' => $request->jumlah_hari_pulang,
                'jumlah_alasan_lain' => $request->jumlah_alasan_lain,
                'kegiatan_gt_Diluar_kelas' => json_encode($kegiatan_gt_Diluar_kelas),
                'interaksi_dengan_pjgt' => $request->interaksi_dengan_pjgt,
                'interaksi_dengan_kepmad' => $request->interaksi_dengan_kepmad,
                'interaksi_dengan_guru' => $request->interaksi_dengan_guru,
                'bisyaroh_bulan_ini' => $request->bisyaroh_bulan_ini,
                'bisyaroh_bulan_ini_sebanyak' => $request->bisyaroh_bulan_ini_sebanyak,
                'kendala_bulan_ini' => $request->kendala_bulan_ini,
                'langkah_pemecahan_kendala' => $request->langkah_pemecahan_kendala,
                'tugas_dari_km_pjgt' => $request->tugas_dari_km_pjgt,
                'tugas_belum_terlaksana' => $request->tugas_belum_terlaksana,
                'usulan' => $request->usulan,
                'tanggal_laporan' => $request->tanggal_laporan,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            LaporanGTModel::create($laporan);
            return back()->with('success', 'Laporan berhasil dikirim');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function laporan()
    {
        $user = Auth::user();
        $gt = GTModel::where('user_id', $user->id)->first();

        if (!$gt) {
            return redirect()->back()->with('error', 'Laporan GT tidak ditemukan');
        }

        $laporan_gt = LaporanGTModel::where('gt_id', $gt->id)
            ->with(['gt.user', 'gt.madrasah', 'gt.pjgt.user'])
            ->get()
            ->map(function ($laporan_gt) {
                $laporan_gt->guru_kelas = json_decode($laporan_gt->guru_kelas, true) ?? [];
                $laporan_gt->jenis_kelamin_murid = json_decode($laporan_gt->jenis_kelamin_murid, true) ?? [];
                $laporan_gt->alasan_tidak_masuk = json_decode($laporan_gt->alasan_tidak_masuk, true) ?? [];
                $laporan_gt->kegiatan_gt_Diluar_kelas = json_decode($laporan_gt->kegiatan_gt_Diluar_kelas, true) ?? [];
                return $laporan_gt;
            });

        return view('GT.laporan-GT', compact('laporan_gt'));
    }

    public function export_laporan()
    {
        return Excel::download(new LaporanGTExport(), 'laporan_gt.xlsx');
    }

    public function exportZipPerLaporanKe($laporanKe)
    {
        $laporanSet = LaporanGTModel::with(['gt.user', 'gt.madrasah', 'gt.pjgt.user'])
            ->where('laporan_ke', $laporanKe)
            ->get();

        if ($laporanSet->isEmpty()) {
            return back()->with('error', "Tidak ada laporan ke-$laporanKe.");
        }

        $zipName = "laporan_ke_{$laporanKe}_" . now()->format('Ymd_His') . ".zip";
        $zipPath = storage_path("app/$zipName");
        $zip = new ZipArchive;

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
            $pdf = Pdf::loadView('admin.data-GT.laporan_gt_pdf', [
                'laporanSet' => $laporanSet,
                'laporanKe' => $laporanKe
            ])->setPaper('a4', 'portrait');

            $zip->addFromString("Laporan_Ke_{$laporanKe}.pdf", $pdf->output());
            $zip->close();

            return response()->download($zipPath)->deleteFileAfterSend(true);
        }

        return back()->with('error', 'Gagal membuat ZIP.');
    }
    public function deleteLaporanGT($id)
    {
        $laporan = LaporanGTModel::findOrFail($id);
        $laporan->delete();
        return redirect()
            ->back()
            ->with('success', 'Laporan GT berhasil dihapus');
    }
}
