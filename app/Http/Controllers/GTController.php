<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GTController extends Controller
{
    public function index()
    {
        return view('admin.data-GT.data-GT');
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
