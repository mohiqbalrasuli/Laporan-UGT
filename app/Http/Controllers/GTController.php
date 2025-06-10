<?php

namespace App\Http\Controllers;

use App\Mail\AktivasiGT;
use App\Models\AksesFormModel;
use App\Models\GTModel;
use App\Models\LaporanGTModel;
use App\Models\MadrasahModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class GTController extends Controller
{
    public function index()
    {
        $gt = User::with(['gt.madrasah', 'gt.pjgt'])
            ->where('role', 'GT')
            ->where('status', 'aktif')
            ->get();
        $madrasah = MadrasahModel::all();
        $pjgt = User::where('role', 'PJGT')->with('pjgt')->where('status', 'aktif')->get();
        return view('admin.data-GT.data-GT', compact('gt', 'madrasah', 'pjgt'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'GT', // harus sama dengan enum
            'status' => 'aktif',
        ]);

        GTModel::create([
            'user_id' => $user->id,
            'alamat' => $request->alamat,
            'status_tugas' => $request->status_tugas,
            'asal_kelas' => $request->asal_kelas,
            'madrasah_id' => $request->madrasah_id,
            'pjgt_id' => $request->pjgt_id ?? null,
        ]);

        return redirect()->back()->with('success', 'Data GT berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $gt = User::findOrFail($id);
        $gt->name = $request->name;
        $gt->save();

        $gtModel = GTModel::where('user_id', $id)->first();
        if ($gtModel) {
            $gtModel->alamat = $request->alamat;
            $gtModel->status_tugas = $request->status_tugas;
            $gtModel->asal_kelas = $request->asal_kelas;
            $gtModel->madrasah_id = $request->madrasah_id;
            $gtModel->pjgt_id = $request->pjgt_id ?? null;
            $gtModel->save();
        }

        return redirect()->back()->with('success', 'Data GT berhasil diupdate');
    }
    public function nonaktif(Request $request, $id)
    {
        $gt = User::findOrFail($id);
        $gt->status = 'tidak_aktif'; // Ubah status menjadi tidak aktif
        $gt->save();

        return redirect()->back()->with('success', 'Data GT berhasil dinonaktifkan');
    }

    public function delete($id)
    {
        $gt = User::findOrFail($id);
        $gt->delete();
        return redirect()->back()->with('success', 'Data GT berhasil dihapus');
    }

    public function validasi()
    {
        $gt = User::where('role', 'GT')->where('status', 'tidak_aktif')->get();
        return view('admin.data-GT.validasi-GT', compact('gt'));
    }
    public function validasi_aktif($id)
    {
        $gt = User::findOrFail($id);
        $gt->status = 'aktif'; // Ubah status menjadi aktif
        $gt->save();

        if ($gt->email) {
            Mail::to($gt->email)->send(new AktivasiGT($gt));
        }

        return redirect()->back()->with('success', 'Data GT berhasil diaktifkan');
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
        $user = Auth::user();
        $today = Carbon::today();

        $mulai = AksesFormModel::where('key', 'tanggal_mulai_gt')->value('value');
        $akhir = AksesFormModel::where('key', 'tanggal_berakhir_gt')->value('value');

        $dalamRentang = $mulai && $akhir && $today->between(Carbon::parse($mulai), Carbon::parse($akhir));

        $sudahLapor = LaporanGTModel::where('user_id', $user->id)->where('tipe', 'gt')->whereMonth('created_at', $today->month)->whereYear('created_at', $today->year)->exists();
        return view('GT.input-laporan-GT', compact('user', 'dalamRentang', 'sudahLapor'));
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
