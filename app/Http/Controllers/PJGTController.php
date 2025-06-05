<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PJGTController extends Controller
{
    Public function index()
    {
        return view('admin.data-PJGT.data-PJGT');
    }

    public function profile()
    {
        return view('PJGT.profile');
    }

    public function input_laporan()
    {
        return view('PJGT.input-laporan-PJGT');
    }
}
