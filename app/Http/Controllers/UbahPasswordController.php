<?php

namespace App\Http\Controllers;

use App\Mail\PasswordVerificationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UbahPasswordController extends Controller
{
    public function ubah_password()
    {
        $layout = match (Auth::user()->role) {
            'GT' => 'GT.layout.template_GT',
            'PJGT' => 'PJGT.layout.template_PJGT',
            default => 'layouts.default', // fallback layout
        };
        return view('ubah_password.ubah-password', compact('layout'));
    }

    public function submitUbahPassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->withErrors(['password_lama' => 'Password lama salah']);
        }

        // Simpan password baru sementara dan generate kode verifikasi
        $kode = rand(100000, 999999);

        session([
            'password_baru_hash' => Hash::make($request->password_baru),
            'kode_verifikasi' => $kode,
            'kode_verifikasi_expired' => now()->addMinutes(10), // misalnya expired 10 menit
        ]);

        // Kirim email verifikasi
        Mail::to($user->email)->send(new PasswordVerificationEmail($kode));

        $layout = match (Auth::user()->role) {
            'GT' => 'GT.layout.template_GT',
            'PJGT' => 'PJGT.layout.template_PJGT',
            default => 'layouts.default', // fallback layout
        };
        return view('ubah_password.verification_code', compact('layout'));
    }

    public function verifikasiKode(Request $request)
    {
        $request->validate(['kode' => 'required']);

        if ($request->kode == session('kode_verifikasi')) {

            $passwordBaru = session('password_baru_hash');

            if (now() > session('kode_verifikasi_expired')) {
                return back()->with('error', 'Kode verifikasi sudah kadaluarsa');
            }

            $user = Auth::user();
            $user->password = $passwordBaru;
            $user->save();

            session()->forget(['kode_verifikasi', 'password_baru_hash', 'kode_verifikasi_expired']);

            // Hapus sesi setelah sukses
            session()->forget(['password_baru_hash', 'kode_verifikasi']);
            if (Auth::user()->role == 'PJGT') {
                return redirect('/PJGT/profile')->with('success', 'Password berhasil diubah.');
            } elseif (Auth::user()->role === 'GT') {
                return redirect('/GT/profile')->with('success', 'Password berhasil diubah.');
            }
        }

        return back()->withErrors(['kode' => 'Kode verifikasi salah']);
    }
}
