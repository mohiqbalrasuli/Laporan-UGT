<?php

namespace App\Http\Controllers;

use App\Mail\AktivasiPJGT;
use App\Models\AksesFormModel;
use App\Models\LaporanPJGTModel;
use App\Models\MadrasahModel;
use App\Models\PJGTModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
            $pjgtModel->no_induk = $request->no_induk;
            $pjgtModel->alamat = $request->alamat;
            $pjgtModel->madrasah_id = $request->madrasah_id;
            $pjgtModel->gt_id = $request->gt_id ?? null;
            $pjgtModel->save();
        }

        return redirect()
            ->back()
            ->with('success', 'Berhasil mengupdate PJGT ' . $pjgt->name);
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
        return view('admin.data-PJGT.data-laporan-PJGT');
    }
    public function profile()
    {
        return view('PJGT.profile');
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
            $sudahLapor = DB::table('table_laporan_pjgt')->where('pjgt_id', $pjgt->id)
            ->where('created_at', '>=', $today->copy()
            ->subMonths(3))
            ->exists();
        }
        return view('PJGT.input-laporan-PJGT', compact('user', 'dalamRentang', 'sudahLapor'));
    }

    public function laporan_store(Request $request)
    {
        $data=[
            'pjgt_id' => $request->pjgt_id,
            'laporan_ke'=> $request->laporan_ke,
            'laporan_bulan'=> $request->laporan_bulan,
            'tahun'=> $request->tahun,
            'wali_kelas'=> $request->wali_kelas,
            'tingkat'=>$request->tingkat,
            'guru_fak_kelas'=>$request->guru_fak_kelas,
            'menjadi_guru'=>$request->menjadi_guru,
            'gt_menjadi_guru'=>$request->gt_menjadi_guru,
            'gt_masuk_madrasah'=>$request->gt_masuk_madrasah,
            'murid_balighah'=>$request->murid_balighah,
            'jenis_kegiatan'=>$request->jenis_kegiatan,
            'waktu_kegiatan'=>$request->waktu_kegiatan,
            'sifat_kegiatan'=>$request->sifat_kegiatan,
            'rambut_gt'=>$request->rambut_gt,
            'gt_bepergian'=>$request->gt_bepergian,
            'berpergian_sebanyak'=>$request->berpergian_sebanyak,
            'tujuan_bepergian'=>$request->tujuan_bepergian,
            'gt_pernah_pulang_kampung'=>$request->gt_pernah_pulang_kampung,
            'pulang_kampung_sebanyak'=>$request->pulang_kampung_sebanyak,
            'gt_melakukan_pelanggaran'=>$request->gt_melakukan_pelanggaran,
            'pelanggran_berupa'=>$request->pelanggran_berupa,
            'pjgt_mengambil_tindakan'=>$request->pjgt_mengambil_tindakan,
            'tindakan_berupa'=>$request->tindakan_berupa,
            'surat_ijin_dipakai'=>$request->surat_ijin_dipakai,
            'hubungan_dengan_pjgt'=>$request->hubungan_dengan_pjgt,
            'hubungan_dengan_kepmad'=>$request->hubungan_dengan_kepmad,
            'hubungan_dengan_guru'=>$request->hubungan_dengan_guru,
            'hubungan_dengan_wali_murid_masyarakat'=>$request->hubungan_dengan_wali_murid_masyarakat,
            'hubungan_dengan_murid_dikelas'=>$request->hubungan_dengan_murid_dikelas,
            'hubungan_dengan_murid_diluar'=>$request->hubungan_dengan_murid_diluar,
            'tanggapan_murid'=>$request->tanggapan_murid,
            'tanggapan_masyarakat'=>$request->tanggapan_masyarakat,
            'bisyaroh_satu'=>$request->bisyaroh_satu,
            'bisyaroh_satu_sebanyak'=>$request->bisyaroh_satu_sebanyak,
            'bisyaroh_dua'=>$request->bisyaroh_dua,
            'bisyaroh_dua_sebanyak'=>$request->bisyaroh_dua_sebanyak,
            'bisyaroh_tiga'=>$request->bisyaroh_tiga,
            'bisyaroh_tiga_sebanyak'=>$request->bisyaroh_tiga_sebanyak,
            'bisyaroh_empat'=>$request->bisyaroh_empat,
            'bisyaroh_empat_sebanyak'=>$request->bisyaroh_empat_sebanyak,
            'bisyaroh_lima'=>$request->bisyaroh_lima,
            'bisyaroh_lima_sebanyak'=>$request->bisyaroh_lima_sebanyak,
            'bisyaroh_enam'=>$request->bisyaroh_enam,
            'bisyaroh_enam_sebanyak'=>$request->bisyaroh_enam_sebanyak,
            'bisyaroh_tujuh'=>$request->bisyaroh_tujuh,
            'bisyaroh_tujuh_sebanyak'=>$request->bisyaroh_tujuh_sebanyak,
            'bisyaroh_delapan'=>$request->bisyaroh_delapan,
            'bisyaroh_delapan_sebanyak'=>$request->bisyaroh_delapan_sebanyak,
            'bisyaroh_sembilan'=>$request->bisyaroh_sembilan,
            'bisyaroh_sembilan_sebanyak'=>$request->bisyaroh_sembilan_sebanyak,
            'bisyaroh_sepuluh'=>$request->bisyaroh_sepuluh,
            'bisyaroh_sepuluh_sebanyak'=>$request->bisyaroh_sepuluh_sebanyak,
            'usulan' => $request->usulan,
        ];
        LaporanPJGTModel::create($data);
        return redirect()
            ->back()
            ->with('success', 'Laporan berhasil disimpan');
    }
    public function laporan()
    {
        return view('PJGT.laporan-PJGT');
    }
}
