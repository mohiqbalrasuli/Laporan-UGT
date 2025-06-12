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
        return view('admin.dashboard',compact('gt','pjgt','madrasah', 'laporan_gt', 'laporan_pjgt'));
    }
}
