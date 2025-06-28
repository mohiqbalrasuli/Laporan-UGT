<?php

namespace App\Http\Controllers;

use App\Models\GTModel;
use App\Models\MasalahGT;
use App\Models\MasalahPJGT;
use App\Models\PJGTModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanMasalah extends Controller
{
    public function index()
    {
        $laporan_pjgt = MasalahPJGT::with(['pjgt', 'pjgt.gt'])->get();
        $laporan_gt = MasalahGT::with(['gt', 'gt.pjgt'])->get();
        $layout = match (Auth::user()->role) {
            'admin' => 'admin.layout.template_admin',
            'pengurus' => 'pengurus.layout.template_pengurus',
            default => 'layouts.default', // fallback layout
            };
        return view('admin.laporan_masalah', compact('laporan_pjgt', 'laporan_gt', 'layout'));
    }
    public function indexPJGT()
    {
        return view('PJGT.laporan_masalah');
    }

    public function storeLaporanBermasahPJGT(Request $request)
    {
         $user = Auth::user();
            $pjgt = PJGTModel::where('user_id', $user->id)->first();
            if (!$pjgt) {
                return redirect()->back()->with('error', 'Data PJGT tidak ditemukan');
            }
            $data = [
                'pjgt_id' => $pjgt->id,
                'Subjek' => $request->Subjek,
                'Isi' => $request->Isi,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            MasalahPJGT::create($data);
            return redirect()->back()->with('success', 'Laporan masalah berhasil dikirim');
    }
    public function indexGT()
    {
        return view('GT.laporan_masalah');
    }

    public function storeLaporanBermasahGT(Request $request)
    {
         $user = Auth::user();
            $gt = GTModel::where('user_id', $user->id)->first();
            if (!$gt) {
                return redirect()->back()->with('error', 'Data GT tidak ditemukan');
            }
            $data = [
                'gt_id' => $gt->id,
                'Subjek' => $request->Subjek,
                'Isi' => $request->Isi,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            MasalahGT::create($data);
            return redirect()->back()->with('success', 'Laporan masalah berhasil dikirim');
    }
}
