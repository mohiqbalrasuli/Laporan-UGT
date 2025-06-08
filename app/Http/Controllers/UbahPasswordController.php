<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UbahPasswordController extends Controller
{
    public function ubah_password()
    {
        return view('GT.ubah-password');
    }
}
