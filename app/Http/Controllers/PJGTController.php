<?php

namespace App\Http\Controllers;

use App\Models\PJGTModel;
use App\Models\User;
use Illuminate\Http\Request;

class PJGTController extends Controller
{
    Public function index()
    {
        return view('admin.data-PJGT.data-PJGT');
    }
    public function validasi()
    {
        return view('admin.data-PJGT.validasi-PJGT');
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
        return view('PJGT.input-laporan-PJGT');
    }

    public function laporan()
    {
        return view('PJGT.laporan-PJGT');
    }
}
