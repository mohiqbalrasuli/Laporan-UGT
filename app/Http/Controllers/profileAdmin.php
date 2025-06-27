<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileAdmin extends Controller
{
    public function index()
    {
        $pengurus = Auth::user();
        return view('admin.profile', compact('pengurus'));
    }

    public function update(Request $request)
    {
        $pengurus = Auth::user();
        $pengurus->name = $request->name;
        $pengurus->save();

        return redirect()->back()->with('success', 'Profile Berhasil diperbarui');
    }
}
