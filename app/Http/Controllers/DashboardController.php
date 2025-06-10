<?php

namespace App\Http\Controllers;

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
        return view('admin.dashboard',compact('gt','pjgt','madrasah'));
    }
}
