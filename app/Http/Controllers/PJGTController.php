<?php

namespace App\Http\Controllers;

use App\Mail\AktivasiPJGT;
use App\Models\MadrasahModel;
use App\Models\PJGTModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PJGTController extends Controller
{
    public function index()
    {
        $pjgt = User::with(['pjgt.madrasah', 'pjgt.gt'])
            ->where('role', 'pjgt')
            ->where('status', 'aktif')
            ->get();

        $madrasah = MadrasahModel::all();
        $gt = User::where('role', 'gt')->where('status', 'aktif')->get();
        return view('admin.data-PJGT.data-PJGT', compact('pjgt', 'madrasah', 'gt'));
    }
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'PJGT', // harus sama dengan enum
            'status' => 'aktif',
        ]);

        PJGTModel::create([
            'no_induk' => $request->no_induk,
            'user_id' => $user->id,
            'alamat' => $request->alamat,
            'madrasah_id' => $request->madrasah_id,
            'gt_id' => $request->gt_id ?? null,
        ]);
        return redirect()->back()->with('success', 'Data PJGT berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $pjgt = User::findOrFail($id);
        $pjgt->name = $request->name;
        $pjgt->save();

        // Update data PJGTModel
        $pjgtModel = PJGTModel::where('user_id', $id)->first();
        if ($pjgtModel) {
            $pjgtModel->no_induk = $request->no_induk;
            $pjgtModel->alamat = $request->alamat;
            $pjgtModel->madrasah_id = $request->madrasah_id;
            $pjgtModel->gt_id = $request->gt_id ?? null;
            $pjgtModel->save();
        }

        return redirect()->back()->with('success', 'Data PJGT berhasil diperbarui');
    }

    public function nonaktif(Request $request, $id)
    {
        $pjgt = User::findOrFail($id);
        $pjgt->status = 'tidak_aktif'; // Ubah status menjadi tidak aktif
        $pjgt->save();

        return redirect()->back()->with('success', 'Data PJGT berhasil dinonaktifkan');
    }

    public function delete($id)
    {
        $pjgt = User::findOrFail($id);
        $pjgt->delete(); // Hapus data PJGT terkait
        return redirect()->back()->with('success', 'Data PJGT berhasil dihapus');
    }

    public function validasi()
    {
        $pjgt = User::where('role', 'pjgt')
            ->where('status', 'tidak_aktif')
            ->get();
        return view('admin.data-PJGT.validasi-PJGT', compact('pjgt'));
    }

    public function validasi_aktif($id)
    {
        $pjgt = User::findOrFail($id);
        $pjgt->status = 'aktif'; // Ubah status menjadi aktif
        $pjgt->save();

        if ($pjgt->email) {
            Mail::to($pjgt->email)->send(new AktivasiPJGT($pjgt));
        }

        return redirect()->back()->with('success', 'Data PJGT berhasil diaktifkan');
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
