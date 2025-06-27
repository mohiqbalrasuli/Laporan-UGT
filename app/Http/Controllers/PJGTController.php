<?php

namespace App\Http\Controllers;

use App\Exports\LaporanPJGTExport;
use App\Mail\AktivasiPJGT;
use App\Models\AksesFormModel;
use App\Models\LaporanPJGTModel;
use App\Models\MadrasahModel;
use App\Models\PJGTModel;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use ZipArchive;

class PJGTController extends Controller
{
    public function index()
    {
        $pjgt = User::with(['pjgt.madrasah', 'pjgt.gt'])
            ->where('role', 'PJGT')
            ->where('status', 'aktif')
            ->get();

        $madrasah = MadrasahModel::all();
        $gt = User::where('role', 'GT')->with('gt')->where('status', 'aktif')->get();
        return view('admin.data-PJGT.data-PJGT', compact('pjgt', 'madrasah', 'gt'));
    }
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'PJGT', // harus sama dengan enum
            'status' => 'aktif',
        ]);

        PJGTModel::create([
            'no_induk' => $request->no_induk,
            'user_id' => $user->id,
            'alamat' => $request->alamat,
            'madrasah_id' => $request->madrasah_id,
            'gt_id' => $request->gt_id ?? null,
        ]);
        return redirect()
            ->back()
            ->with('success', 'Berhasil menambahkan' . $user->name . 'sebagai PJGT');
    }

    public function update(Request $request, $id)
    {
        $pjgt = User::findOrFail($id);
        $pjgt->name = $request->name;
        $pjgt->save();

        // Update data PJGTModel
        $pjgtModel = PJGTModel::where('user_id', $id)->first();
        if ($pjgtModel) {
            $pjgtModel->alamat = $request->alamat;
            if (Auth::user()->role == 'admin') {
                $pjgtModel->no_induk = $request->no_induk;
                $pjgtModel->madrasah_id = $request->madrasah_id ?? null;
                $pjgtModel->gt_id = $request->gt_id ?? null;
            }
            $pjgtModel->save();
        }
        if(Auth::user()->role=='admin'){
        return redirect()
            ->back()
            ->with('success', 'Berhasil mengupdate PJGT ' . $pjgt->name);
        }elseif(Auth::user()->role == 'PJGT'){
        return redirect()
            ->back()
            ->with('success', 'Data Anda Berhasil Diupdate');
        }
    }

    public function nonaktif(Request $request, $id)
    {
        $pjgt = User::findOrFail($id);
        $pjgt->status = 'tidak_aktif'; // Ubah status menjadi tidak aktif
        $pjgt->save();

        return redirect()
            ->back()
            ->with('success', $pjgt->name . ' berhasil dinonaktifkan');
    }

    public function delete($id)
    {
        $pjgt = User::findOrFail($id);
        $pjgt->delete(); // Hapus data PJGT terkait
        return redirect()
            ->back()
            ->with('success', $pjgt->name . ' berhasil dihapus');
    }

    public function validasi()
    {
        $pjgt = User::where('role', 'pjgt')->where('status', 'tidak_aktif')->get();
        return view('admin.data-PJGT.validasi-PJGT', compact('pjgt'));
    }

    public function validasi_aktif($id)
    {
        $pjgt = User::findOrFail($id);
        $pjgt->status = 'aktif'; // Ubah status menjadi aktif
        $pjgt->save();

        if ($pjgt->email) {
            Mail::to($pjgt->email)->send(new AktivasiPJGT($pjgt));
        }

        return redirect()
            ->back()
            ->with('success', $pjgt->name . ' berhasil diaktifkan');
    }
    public function data_laporan()
    {
        $laporan_pjgt = LaporanPJGTModel::with(['pjgt.user', 'pjgt.madrasah', 'pjgt.gt.user'])
            ->get()
            ->map(function ($laporan_pjgt) {
                $laporan_pjgt->tingkat = json_decode($laporan_pjgt->tingkat, true) ?? [];
                $laporan_pjgt->guru_fak_kelas = json_decode($laporan_pjgt->guru_fak_kelas, true) ?? [];
                $laporan_pjgt->menjadi_guru = json_decode($laporan_pjgt->menjadi_guru, true) ?? [];
                $laporan_pjgt->waktu_kegiatan = json_decode($laporan_pjgt->waktu_kegiatan, true) ?? [];
                return $laporan_pjgt;
            });
            $layout = match (Auth::user()->role) {
            'admin' => 'admin.layout.template_admin',
            'pengurus' => 'pengurus.layout.template_pengurus',
            default => 'layouts.default', // fallback layout
            };

        return view('admin.data-PJGT.data-laporan-PJGT', compact('laporan_pjgt','layout'));
    }
    public function profile()
    {
        $pjgt = User::with(['pjgt.madrasah', 'pjgt.gt'])
            ->where('role', 'PJGT')
            ->where('id', Auth::user()->id)
            ->where('status', 'aktif')
            ->first();
        return view('PJGT.profile', compact('pjgt'));
    }

    public function input_laporan()
    {
        $user = Auth::user();
        $today = Carbon::today();

        $mulai = AksesFormModel::latest()->value('tanggal_mulai_pjgt');
        $akhir = AksesFormModel::latest()->value('tanggal_akhir_pjgt');

        $dalamRentang = false;
        if ($mulai && $akhir) {
            $dalamRentang = $today->between(Carbon::parse($mulai), Carbon::parse($akhir));
        }

        $pjgt = DB::table('table_pjgt')->where('user_id', $user->id)->first();
        $sudahLapor = false;
        if ($pjgt) {
            $sudahLapor = DB::table('table_laporan_pjgt')
                ->where('pjgt_id', $pjgt->id)
                ->where('created_at', '>=', $today->copy()->subMonths(3))
                ->exists();
        }
        $jumlahLaporan = DB::table('table_laporan_pjgt')->where('pjgt_id', Auth::user())->count();
        return view('PJGT.input-laporan-PJGT',['batch' => $jumlahLaporan], compact('user', 'dalamRentang', 'sudahLapor',));
    }

    public function laporan_store(Request $request)
    {
        try {
            // Get authenticated user and their PJGT data
            $user = Auth::user();
            $pjgt = PJGTModel::where('user_id', $user->id)->first();
            if (!$pjgt) {
                return redirect()->back()->with('error', 'Data PJGT tidak ditemukan');
            }

            // Validate the request
            $request->validate([
                'laporan_ke' => 'required|numeric',
                'laporan_bulan' => 'required|string|in:Muharram,Rabiul Awal,Jumadal Tsaniyah,Sya\'ban',
                'tahun' => 'required|string',
                'wali_kelas' => 'required|string|in:1,2,3,4,5,6',
                'tingkat' => 'required|array',
                'guru_fak_kelas' => 'required|array',
                'menjadi_guru' => 'required|array',
                'gt_masuk_madrasah' => 'required|string|in:Rajin,Tidak Rajin',
                'murid_balighah' => 'required|string|in:Ya,Tidak',
                'jenis_kegiatan' => 'required|string',
                'waktu_kegiatan' => 'required|array',
                'sifat_kegiatan' => 'required|string|in:Baru,Melanjutkan',
                'rambut_gt' => 'required|string|in:Pendek,Melebihi Batas',
                'gt_bepergian' => 'required|string|in:Ya,Tidak',
                'berpergian_sebanyak' => 'required_if:gt_bepergian,Ya|nullable|numeric|in:1,2,3,4,5',
                'tujuan_bepergian' => 'required_if:gt_bepergian,Ya|nullable|string',
                'gt_pernah_pulang_kampung' => 'required|string|in:ya,tidak',
                'pulang_kampung_sebanyak' => 'required_if:gt_pernah_pulang_kampung,ya|nullable|numeric|in:1,2,3,4,5',
                'gt_melakukan_pelanggaran' => 'required|string|in:ya,tidak',
                'pelanggran_berupa' => 'required_if:gt_melakukan_pelanggaran,ya|nullable|string',
                'pjgt_mengambil_tindakan' => 'required_if:gt_melakukan_pelanggaran,ya|nullable|string|in:ya,tidak',
                'tindakan_berupa' => 'required_if:pjgt_mengambil_tindakan,ya|nullable|string',
                'surat_ijin_dipakai' => 'required|numeric|in:1,2,3,4,5',
                'hubungan_dengan_pjgt' => 'required|string|in:jarang,sering,tidak_pernah',
                'hubungan_dengan_kepmad' => 'required|string|in:jarang,sering,tidak_pernah',
                'hubungan_dengan_guru' => 'required|string|in:jarang,sering,tidak_pernah',
                'hubungan_dengan_wali_murid_masyarakat' => 'required|string|in:jarang,sering,tidak_pernah',
                'hubungan_dengan_murid_dikelas' => 'required|string|in:aktif,pasif',
                'hubungan_dengan_murid_diluar' => 'required|string|in:aktif,pasif',
                'tanggapan_murid' => 'required|string|in:baik,tidak baik',
                'tanggapan_masyarakat' => 'required|string|in:baik,tidak baik',
                'bisyaroh_satu' => 'required|string|in:Ya,Tidak',
                'bisyaroh_satu_sebanyak' => 'required_if:bisyaroh_satu,Ya|nullable|numeric',
                'bisyaroh_dua' => 'required|string|in:Ya,Tidak',
                'bisyaroh_dua_sebanyak' => 'required_if:bisyaroh_dua,Ya|nullable|numeric',
                'bisyaroh_tiga' => 'required|string|in:Ya,Tidak',
                'bisyaroh_tiga_sebanyak' => 'required_if:bisyaroh_tiga,Ya|nullable|numeric',
                'usulan' => 'required|string',
            ]);

            // Prepare data for storage
            $data = [
                'pjgt_id' => $pjgt->id,
                'laporan_ke' => $request->laporan_ke,
                'laporan_bulan' => $request->laporan_bulan,
                'tahun' => $request->tahun,
                'wali_kelas' => $request->wali_kelas,
                'tingkat' => json_encode($request->tingkat),
                'guru_fak_kelas' => json_encode($request->guru_fak_kelas),
                'menjadi_guru' => json_encode($request->menjadi_guru),
                'gt_masuk_madrasah' => $request->gt_masuk_madrasah,
                'murid_balighah' => $request->murid_balighah,
                'jenis_kegiatan' => $request->jenis_kegiatan,
                'waktu_kegiatan' => json_encode($request->waktu_kegiatan),
                'sifat_kegiatan' => $request->sifat_kegiatan,
                'rambut_gt' => $request->rambut_gt,
                'gt_bepergian' => $request->gt_bepergian,
                'berpergian_sebanyak' => $request->berpergian_sebanyak,
                'tujuan_bepergian' => $request->tujuan_bepergian,
                'gt_pernah_pulang_kampung' => $request->gt_pernah_pulang_kampung,
                'pulang_kampung_sebanyak' => $request->pulang_kampung_sebanyak,
                'gt_melakukan_pelanggaran' => $request->gt_melakukan_pelanggaran,
                'pelanggran_berupa' => $request->pelanggran_berupa,
                'pjgt_mengambil_tindakan' => $request->pjgt_mengambil_tindakan,
                'tindakan_berupa' => $request->tindakan_berupa,
                'surat_ijin_dipakai' => $request->surat_ijin_dipakai,
                'hubungan_dengan_pjgt' => $request->hubungan_dengan_pjgt,
                'hubungan_dengan_kepmad' => $request->hubungan_dengan_kepmad,
                'hubungan_dengan_guru' => $request->hubungan_dengan_guru,
                'hubungan_dengan_wali_murid_masyarakat' => $request->hubungan_dengan_wali_murid_masyarakat,
                'hubungan_dengan_murid_dikelas' => $request->hubungan_dengan_murid_dikelas,
                'hubungan_dengan_murid_diluar' => $request->hubungan_dengan_murid_diluar,
                'tanggapan_murid' => $request->tanggapan_murid,
                'tanggapan_masyarakat' => $request->tanggapan_masyarakat,
                'bisyaroh_satu' => $request->bisyaroh_satu ?? 'Tidak',
                'bisyaroh_satu_sebanyak' => $request->bisyaroh_satu_sebanyak,
                'bisyaroh_dua' => $request->bisyaroh_dua ?? 'Tidak',
                'bisyaroh_dua_sebanyak' => $request->bisyaroh_dua_sebanyak,
                'bisyaroh_tiga' => $request->bisyaroh_tiga ?? 'Tidak',
                'bisyaroh_tiga_sebanyak' => $request->bisyaroh_tiga_sebanyak,
                'bisyaroh_empat' => $request->bisyaroh_empat ?? 'Tidak',
                'bisyaroh_empat_sebanyak' => $request->bisyaroh_empat_sebanyak,
                'bisyaroh_lima' => $request->bisyaroh_lima  ?? 'Tidak',
                'bisyaroh_lima_sebanyak' => $request->bisyaroh_lima_sebanyak,
                'bisyaroh_enam' => $request->bisyaroh_enam  ?? 'Tidak',
                'bisyaroh_enam_sebanyak' => $request->bisyaroh_enam_sebanyak,
                'bisyaroh_tujuh' => $request->bisyaroh_tujuh  ?? 'Tidak',
                'bisyaroh_tujuh_sebanyak' => $request->bisyaroh_tujuh_sebanyak,
                'bisyaroh_delapan' => $request->bisyaroh_delapan  ?? 'Tidak',
                'bisyaroh_delapan_sebanyak' => $request->bisyaroh_delapan_sebanyak,
                'bisyaroh_sembilan' => $request->bisyaroh_sembilan ?? 'Tidak',
                'bisyaroh_sembilan_sebanyak' => $request->bisyaroh_sembilan_sebanyak,
                'bisyaroh_sepuluh' => $request->bisyaroh_sepuluh ?? 'Tidak',
                'bisyaroh_sepuluh_sebanyak' => $request->bisyaroh_sepuluh_sebanyak,
                'usulan' => $request->usulan,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            LaporanPJGTModel::create($data);
            return redirect()->back()->with('success', 'Laporan berhasil disimpan');
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
        $pjgt = PJGTModel::where('user_id', $user->id)->first();

        if (!$pjgt) {
            return redirect()->back()->with('error', 'Data PJGT tidak ditemukan');
        }

        $laporan_pjgt = LaporanPJGTModel::where('pjgt_id', $pjgt->id)
            ->with(['pjgt.user', 'pjgt.madrasah', 'pjgt.gt.user'])
            ->get()
            ->map(function ($laporan_pjgt) {
                $laporan_pjgt->tingkat = json_decode($laporan_pjgt->tingkat, true) ?? [];
                $laporan_pjgt->guru_fak_kelas = json_decode($laporan_pjgt->guru_fak_kelas, true) ?? [];
                $laporan_pjgt->menjadi_guru = json_decode($laporan_pjgt->menjadi_guru, true) ?? [];
                $laporan_pjgt->waktu_kegiatan = json_decode($laporan_pjgt->waktu_kegiatan, true) ?? [];
                return $laporan_pjgt;
            });

        return view('PJGT.laporan-PJGT', compact('laporan_pjgt'));
    }

    public function export_laporan()
    {
        return Excel::download(new LaporanPJGTExport(), 'laporan_pjgt.xlsx');
    }

    public function exportZipPerLaporanKe($laporanKe)
    {
        $laporanSet = LaporanPJGTModel::with(['pjgt.user', 'pjgt.madrasah', 'pjgt.gt.user'])
            ->where('laporan_ke', $laporanKe)
            ->get();

        if ($laporanSet->isEmpty()) {
            return back()->with('error', "Tidak ada laporan ke-$laporanKe.");
        }

        $zipName = "laporan_ke_{$laporanKe}_" . now()->format('Ymd_His') . ".zip";
        $zipPath = storage_path("app/$zipName");
        $zip = new ZipArchive;

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
            $pdf = Pdf::loadView('admin.data-PJGT.laporan_pjgt_pdf', [
                'laporanSet' => $laporanSet,
                'laporanKe' => $laporanKe
            ])->setPaper('a4', 'portrait');

            $zip->addFromString("Laporan_Ke_{$laporanKe}.pdf", $pdf->output());
            $zip->close();

            return response()->download($zipPath)->deleteFileAfterSend(true);
        }

        return back()->with('error', 'Gagal membuat ZIP.');
    }
}
