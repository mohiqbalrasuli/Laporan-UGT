<?php

namespace App\Http\Controllers;

use App\Models\LaporanGTModel;
use App\Models\LaporanPJGTModel;
use App\Models\MadrasahModel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $madrasah = MadrasahModel::count();
        $gt = User::where('role','GT')->where('status','aktif')->count();
        $pjgt = User::where('role','PJGT')->where('status','aktif')->count();
        $laporan_gt = LaporanGTModel::all()->count();
        $laporan_pjgt = LaporanPJGTModel::all()->count();
        $laporan_gt_terbaru = LaporanGTModel::with(['gt.user', 'gt.madrasah', 'gt.pjgt.user'])->orderby('created_at', 'desc')->take(5)->get();
        $laporan_pjgt_terbaru = LaporanPJGTModel::with(['pjgt.user', 'pjgt.madrasah', 'pjgt.gt.user'])->orderby('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard',compact('gt','pjgt','madrasah', 'laporan_gt', 'laporan_pjgt', 'laporan_gt_terbaru', 'laporan_pjgt_terbaru'));
    }
}
