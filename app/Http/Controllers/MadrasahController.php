<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MadrasahController extends Controller
{
    public function index()
    {
        return view('admin.data-madrasah.data-madrasah');
    }
}
