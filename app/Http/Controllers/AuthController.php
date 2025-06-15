<?php

namespace App\Http\Controllers;

use App\Models\GTModel;
use App\Models\PJGTModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Stringable;

class AuthController extends Controller
{
    public function ShowLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        // Cek jika user tidak ditemukan
        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan.');
        }

        // Cek status user
        if ($user->status === 'tidak_aktif') {
            return back()->with('error', 'Akun Anda belum aktif, silakan hubungi admin.');
        }

        // Coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
            switch (Auth::user()->role) {
                case 'admin':
                    return redirect('admin/dashboard')->with('success_login', 'Berhasil masuk sebagai admin');
                case 'PJGT':
                    return redirect('PJGT/profile')->with('success_login', 'Berhasil masuk sebagai PJGT');
                case 'GT':
                    return redirect('GT/profile')->with('success_login', 'Berhasil masuk sebagai Guru Tugas');
                default:
                    Auth::logout();
                    return back()->with('error', 'Role pengguna tidak dikenali.');
            }
        }

        // Jika gagal login (password salah)
        return back()->with('error', 'Email atau password salah.');
    }

    public function ShowRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the request data
        $data = $request->validate(
            [
                'role' => 'required|in:PJGT,GT',
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ],
            [
                // Pesan kustom dalam Bahasa Indonesia
                'role.required' => 'Jabatan Wajib Dipilih',
                'name.required' => 'Nama wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah digunakan.',
                'password.required' => 'Kata sandi wajib diisi.',
                'password.min' => 'Kata sandi minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            ],
        );

        // Create the user
        $user = User::create([
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at'=>now(),
            'password' => Hash::make($request->password),
            'status' => 'tidak_aktif',
            'remember_token' => Str::random(10),
        ]);
        if ($request->role === 'GT') {
            GTModel::create([
                'user_id' => $user->id,
                'alamat' => null,
                'asal_kelas' => null,
                'status_tugas' => null,
                'madrasah_id' => null,
                'pjgt_id' => null,
            ]);
        } elseif ($request->role === 'PJGT') {
            PJGTModel::create([
                'no_induk' => null,
                'user_id' => $user->id,
                'gt_id' => null,
                'alamat' => null,
                'madrasah_id' => null,
            ]);
        }

        Session::flash('success_register', 'Registrasi berhasil, silakan masuk');
        return redirect('login');
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('login')->with('success_logout', 'Berhasil keluar');
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }
}
