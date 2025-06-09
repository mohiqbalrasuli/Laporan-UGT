<?php

namespace App\Http\Controllers;

use App\Models\MadrasahModel;
use Illuminate\Http\Request;

class MadrasahController extends Controller
{
    public function index()
    {
        $madrasah = MadrasahModel::all();
        return view('admin.data-madrasah.data-madrasah', compact('madrasah'));
    }
    public function store(Request $request)
    {
        $data=[
            'nama_madrasah' => $request->nama_madrasah,
            'alamat_madrasah' => $request->alamat_madrasah,
            'nama_kepala_madrasah' => $request->nama_kepala_madrasah,
        ];

        MadrasahModel::create($data);
        return redirect()->back()->with('success', 'Madrasah berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        $madrasah = MadrasahModel::findOrFail($id);
        $data = [
            'nama_madrasah' => $request->nama_madrasah,
            'alamat_madrasah' => $request->alamat_madrasah,
            'nama_kepala_madrasah' => $request->nama_kepala_madrasah,
        ];
        $madrasah->update($data);
        return redirect()->back()->with('success', 'Madrasah berhasil diperbarui.');
    }
    public function delete($id)
    {
        $madrasah = MadrasahModel::findOrFail($id);
        $madrasah->delete();
        return redirect()->back()->with('success', 'Madrasah berhasil dihapus.');
    }
}
