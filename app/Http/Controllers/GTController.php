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
            $gtModel->madrasah_id = $request->madrasah_id ?? null;
            $gtModel->pjgt_id = $request->pjgt_id ?? null;
            $gtModel->save();
        }

        return redirect()
            ->back()
            ->with('success', $gt->name . ' berhasil diupdate');
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
        return view('admin.data-GT.data-laporan-gt');
    }

    public function profile()
    {
        $gt = User::with(['gt.madrasah', 'gt.pjgt'])
            ->where('role', 'GT')
            ->where('id',Auth::user()->id)
            ->where('status', 'aktif')
            ->first();
        return view('GT.profile',compact('gt'));
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
        $sudahLapor = DB::table('table_laporan_gt')
            ->where('gt_id', $gt->id)
            ->whereMonth('created_at', $today->month)
            ->whereYear('created_at', $today->year)
            ->exists();
    }
        return view('GT.input-laporan-GT', compact('user', 'dalamRentang', 'sudahLapor'));
    }

    public function laporan_store(Request $request)
    {
        $user = Auth::user();
        $gt = DB::table('table_gt')->where('user_id', $user->id)->first();
        $data=[
            'gt_id'=>$gt,
            'laporan_ke'=>$request->laporan_ke,
            'bulan_tahun'=>$request->bulan_tahun,
            'wali_kelas'=>$request->wali_kelas,
            'guru_kelas'=>$request->guru_kelas,
            'guru_fan'=>$request->guru_fan,
            'jenis_kelamin_murid'=>$request->jenis_kelamin_murid,
            'jumlah_mengajar_satu_minggu'=>$request->jumlah_mengajar_satu_minggu,
            'jumlah_mengajar_satu_bulan'=>$request->jumlah_mengajar_satu_bulan,
            'alasan_tidak_masuk'=>$request->alasan_tidak_masuk,
            'jumlah_hari_sakit'=>$request->jumlah_hari_sakit,
            'jumlah_hari_pulang'=>$request->jumlah_hari_pulang,
            'jumlah_alasan_lain'=>$request->jumlah_alasan_lain,
            'kegiatan_gt_Diluar_kelas'=>$request->kegiatan_gt_Diluar_kelas,
            'interaksi_dengan_pjgt'=>$request->interaksi_dengan_pjgt,
            'interaksi_dengan_kepmad'=>$request->interaksi_dengan_kepmad,
            'interaksi_dengan_guru'=>$request->interaksi_dengan_guru,
            'bisyaroh_bulan_ini'=>$request->bisyaroh_bulan_ini,
            'bisyaroh_bulan_ini_sebanyak'=>$request->bisyaroh_bulan_ini_sebanyak,
            'kendala_bulan_ini'=>$request->kendala_bulan_ini,
            'langkah_pemecahan_kendala'=>$request->langkah_pemecahan_kendala,
            'tugas_dari_km_pjgt'=>$request->tugas_dari_km_pjgt,
            'tugas_belum_terlaksana'=>$request->tugas_belum_terlaksana,
            'usulan'=>$request->usulan,
        ];
        LaporanGTModel::create($data);
        return redirect()->back()->with('success', 'Laporan berhasil disimpan');
    }

    public function laporan()
    {
        return view('GT.laporan-GT');
    }

}
