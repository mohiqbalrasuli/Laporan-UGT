<?php

namespace App\Http\Controllers;

use App\Models\GTModel;
use App\Models\User;
use Illuminate\Http\Request;

class GTController extends Controller
{
    public function index()
    {
        return view('admin.data-GT.data-GT');
    }
    public function validasi()
    {
        return view('admin.data-GT.validasi-GT');
    }
    public function data_laporan()
    {
        return view('admin.data-GT.data-laporan-gt');
    }

    public function profile()
    {
        return view('GT.profile');
    }

    public function input_laporan()
    {
        return view('GT.input-laporan-GT');
    }

    public function laporan()
    {
        return view('GT.laporan-GT');
    }
    public function ubah_password()
    {
        return view('GT.ubah-password');
    }
}
