<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PengurusModel;
use App\Models\MadrasahModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PengurusController extends Controller
{
    public function index()
    {
        $pengurus = User::with('pengurus')->where('role','pengurus')->where('status','aktif')->get();
        return view('admin.pengurus.data_pengurus',compact('pengurus'));
    }
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pengurus', // harus sama dengan enum
            'status' => 'aktif',
        ]);

        PengurusModel::create([
            'user_id' => $user->id,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->back()
            ->with('success', $user->name . ' berhasil ditambahkan');
    }
    public function update(Request $request, $id)
    {
        $pengurus = User::findOrFail($id);
        $pengurus->name = $request->name;
        $pengurus->save();

        $pengurusModel = PengurusModel::where('user_id', $id)->first();
        if ($pengurusModel) {
            $pengurusModel->alamat = $request->alamat;
            $pengurusModel->save();
        }

        if(Auth::user()->role=='admin'){
        return redirect()
            ->back()
            ->with('success', 'Berhasil mengupdate pengurus ' . $pengurus->name);
        }elseif(Auth::user()->role == 'pengurus'){
        return redirect()
            ->back()
            ->with('success', 'Data Anda Berhasil Diupdate');
        }
    }
    public function delete($id)
    {
        $pengurus = User::findOrFail($id);
        $pengurus->delete();
        return redirect()
            ->back()
            ->with('success', $pengurus->name . ' berhasil dihapus');
    }
    public function profile()
    {
        $pengurus = User::with(['pengurus'])
            ->where('role', 'pengurus')
            ->where('id', Auth::user()->id)
            ->where('status', 'aktif')
            ->first();
        return view('pengurus.profile', compact('pengurus'));
    }
    public function madrasah()
    {
        $madrasah = MadrasahModel::all();
        return view('pengurus.data_madrasah', compact('madrasah'));
    }
    public function pjgt()
    {
        $pjgt = User::with(['pjgt.madrasah', 'pjgt.gt'])
            ->where('role', 'PJGT')
            ->where('status', 'aktif')
            ->get();

        return view('pengurus.data-pjgt', compact('pjgt'));
    }
    public function gt()
    {
        $gt = User::with(['gt.madrasah', 'gt.gt'])
            ->where('role', 'GR')
            ->where('status', 'aktif')
            ->get();

        return view('pengurus.data-gt', compact('gt'));
    }
}
