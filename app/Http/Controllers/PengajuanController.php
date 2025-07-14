<?php

namespace App\Http\Controllers;

use App\Models\pengajuanGt;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function pengajuanGT()
    {
        $layout = match (Auth::user()->role) {
            'admin' => 'admin.layout.template_admin',
            'pengurus' => 'pengurus.layout.template_pengurus',
            default => 'layouts.default', // fallback layout
        };
        Carbon::setLocale('id');
        $hasilpengajuan = pengajuanGt::whereYear('created_at', Carbon::now()->year)
                              ->orderBy('created_at', 'desc')
                              ->get();
        return view('admin.pengajuan.pengajuan', compact('hasilpengajuan', 'layout'));
    }
    public function deletePengajuan($id)
    {
        $pengajuan = pengajuanGt::findOrFail($id);
        $pengajuan->delete();
        return redirect()->back()->with('success', 'Pengajuan berhasil dihapus.');
    }
    public function index()
    {
        return view('pengajuan_gt.pengajuan');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_madrasah' => 'required|string',
            'alamat_madrasah' => 'required|string',
            'no_telp' => 'required|string',
            'nama_pjgt' => 'required|string',
            'umur_pjgt' => 'required|integer',
            'kepala_madrasah' => 'required|string',
            'umur_kepala_madrasah' => 'required|string',
            'ketua' => 'required|string',
            'wakil_ketua' => 'required|string',
            'sekretaris' => 'required|string',
            'bendahara' => 'required|string',
            'madrasah_berada_di' => 'required|string',
            'kitab_yang_dibaca' => 'required|string',
            'bahasa_makna_kitab' => 'required|string',
            'bahasa_pengantar_Pelajaran' => 'required|string',
            'jumlah_guru' => 'required|integer',
            'jumlah_guru_lk' => 'required|integer',
            'jumlah_guru_pr' => 'required|integer',
            'jumlah_murid_lk' => 'required|integer',
            'jumlah_murid_pr' => 'required|integer',
            'jumlah_murid' => 'required|integer',
            'jumlah_kelas_1' => 'required|integer',
            'jumlah_kelas_1_lk' => 'required|integer',
            'jumlah_kelas_1_pr' => 'required|integer',
            'jumlah_kelas_2' => 'required|integer',
            'jumlah_kelas_2_lk' => 'required|integer',
            'jumlah_kelas_2_pr' => 'required|integer',
            'jumlah_kelas_3' => 'required|integer',
            'jumlah_kelas_3_lk' => 'required|integer',
            'jumlah_kelas_3_pr' => 'required|integer',
            'jumlah_kelas_4' => 'required|integer',
            'jumlah_kelas_4_lk' => 'required|integer',
            'jumlah_kelas_4_pr' => 'required|integer',
            'jumlah_kelas_5' => 'required|integer',
            'jumlah_kelas_5_lk' => 'required|integer',
            'jumlah_kelas_5_pr' => 'required|integer',
            'jumlah_kelas_6' => 'required|integer',
            'jumlah_kelas_6_lk' => 'required|integer',
            'jumlah_kelas_6_pr' => 'required|integer',
            'gt_yang_diajukan' => 'required|integer',
            'rencana_mengajar_kelas' => 'required|string',
            'lain_lain' => 'nullable|string',
        ]);

        // Simpan data ke database (asumsikan modelnya bernama PendaftaranMadrasah)
        $data = [
            'nama_madrasah' => $request->nama_madrasah,
            'alamat_madrasah' => $request->alamat_madrasah,
            'no_telp' => $request->no_telp,
            'nama_pjgt' => $request->nama_pjgt,
            'umur_pjgt' => $request->umur_pjgt,
            'kepala_madrasah' => $request->kepala_madrasah,
            'umur_kepala_madrasah' => $request->umur_kepala_madrasah,
            'ketua' => $request->ketua,
            'wakil_ketua' => $request->wakil_ketua,
            'sekretaris' => $request->sekretaris,
            'bendahara' => $request->bendahara,
            'madrasah_berada_di' => $request->madrasah_berada_di,
            'kitab_yang_dibaca' => $request->kitab_yang_dibaca,
            'bahasa_makna_kitab' => $request->bahasa_makna_kitab,
            'bahasa_pengantar_Pelajaran' => $request->bahasa_pengantar_Pelajaran,
            'jumlah_guru' => $request->jumlah_guru,
            'jumlah_guru_lk' => $request->jumlah_guru_lk,
            'jumlah_guru_pr' => $request->jumlah_guru_pr,
            'jumlah_murid' => $request->jumlah_murid,
            'jumlah_murid_lk' => $request->jumlah_murid_lk,
            'jumlah_murid_pr' => $request->jumlah_murid_pr,
            'jumlah_kelas_1' => $request->jumlah_kelas_1,
            'jumlah_kelas_1_lk' => $request->jumlah_kelas_1_lk,
            'jumlah_kelas_1_pr' => $request->jumlah_kelas_1_pr,
            'jumlah_kelas_2' => $request->jumlah_kelas_2,
            'jumlah_kelas_2_lk' => $request->jumlah_kelas_2_lk,
            'jumlah_kelas_2_pr' => $request->jumlah_kelas_2_pr,
            'jumlah_kelas_3' => $request->jumlah_kelas_3,
            'jumlah_kelas_3_lk' => $request->jumlah_kelas_3_lk,
            'jumlah_kelas_3_pr' => $request->jumlah_kelas_3_pr,
            'jumlah_kelas_4' => $request->jumlah_kelas_4,
            'jumlah_kelas_4_lk' => $request->jumlah_kelas_4_lk,
            'jumlah_kelas_4_pr' => $request->jumlah_kelas_4_pr,
            'jumlah_kelas_5' => $request->jumlah_kelas_5,
            'jumlah_kelas_5_lk' => $request->jumlah_kelas_5_lk,
            'jumlah_kelas_5_pr' => $request->jumlah_kelas_5_pr,
            'jumlah_kelas_6' => $request->jumlah_kelas_6,
            'jumlah_kelas_6_lk' => $request->jumlah_kelas_6_lk,
            'jumlah_kelas_6_pr' => $request->jumlah_kelas_6_pr,
            'gt_yang_diajukan' => $request->gt_yang_diajukan,
            'rencana_mengajar_kelas' => $request->rencana_mengajar_kelas,
            'lain_lain' => $request->lain_lain,
        ];
        $pendaftaran = pengajuanGt::create($data);

        // Redirect ke halaman hasil pendaftaran
        return redirect('/pengajuan-gt/hasil/' . $pendaftaran->id)->with('success', 'Data pendaftaran berhasil disimpan!');
    }

    public function Show($id)
    {
        Carbon::setLocale('id');
        $hasil = pengajuanGt::findOrFail($id);
        return view('pengajuan_gt.hasil', compact('hasil'));
    }
    public function cetakPdf($id)
    {
        $data = PengajuanGT::findOrFail($id);
        Carbon::setLocale('id');

        $pdf = Pdf::loadView('pengajuan_gt.hasilpdf', compact('data'))->setPaper('a4', 'portrait');

        return $pdf->download('pengajuan gt ' . $data->nama_pjgt . '.pdf');
    }
}
