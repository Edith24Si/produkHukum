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
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        $request->session()->regenerate();
        return redirect()->route('dashboard')->with('success', 'Login berhasil!');
    }

    return back()->with('error', 'Username atau password salah.');
}

    // 🔹 Halaman setelah login berhasil
    public function success()
    {
        if (!session()->has('username')) {
            return redirect()->route('auth.login')->with('error', 'Silakan login terlebih dahulu!');
        }

        return view('auth.success'); // Tampilkan halaman "Login Berhasil"
    }

   public function logout(Request $request)
{
    // Hapus semua session login
    $request->session()->flush();

    // Redirect kembali ke halaman login
    return redirect()->route('login.show')->with('success', 'Anda telah logout.');
}

}
