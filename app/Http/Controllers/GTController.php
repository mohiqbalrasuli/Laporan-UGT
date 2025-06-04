<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GTController extends Controller
{
    public function index()
    {
        return view('admin.data-GT.data-GT');
    }

    public function profile()
    {
        return view('GT.profile');
    }
}
