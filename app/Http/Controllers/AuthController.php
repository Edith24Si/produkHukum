<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // 🔹 Menampilkan form login
    public function index()
    {
        return view('auth.login');
    }

    // 🔹 Memproses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/' // Harus ada huruf kapital
            ]
        ], [
            'username.required' => 'Username wajib diisi!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal 3 karakter!',
            'password.regex' => 'Password harus mengandung huruf kapital!',
        ]);

        // Data login yang valid (hardcode)
        $validUser = "Admin";
        $validPass = "Admin123";

        // Cek kecocokan input dengan data valid
        if ($request->username === $validUser && $request->password === $validPass) {
            // Simpan session login
            session()->put('username', $request->username);

            // Login berhasil → redirect ke halaman success
            return redirect()->route('auth.success');
        } else {
            // Login gagal → kembali ke halaman login
            return redirect()->back()->with('error', 'Username atau password salah!');
        }
    }

    // 🔹 Halaman setelah login berhasil
    public function success()
    {
        if (!session()->has('username')) {
            return redirect()->route('auth.login')->with('error', 'Silakan login terlebih dahulu!');
        }

        return view('auth.success'); // Tampilkan halaman "Login Berhasil"
    }

    // 🔹 Logout
    public function logout()
    {
        session()->forget('username');
        return redirect()->route('auth.login')->with('success', 'Anda telah logout.');
    }
}
