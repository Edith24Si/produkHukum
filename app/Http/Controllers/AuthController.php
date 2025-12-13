<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login'); // Pastikan view 'auth.login' ada
    }

    public function showRegisterForm()
    {
        return view('pages.auth.register');
    }

    public function processregister(Request $request)
    {
        // 1. Validasi Input Pendaftaran
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' akan mencari input 'password_confirmation'
        ]);

        // 2. Buat User Baru
        // Kita paksa role-nya menjadi 'user' secara default untuk pendaftaran publik.
        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user', // Default role untuk pendaftaran umum
        ]);

        // 3. Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            session(['last_login' => now()]);
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        } else {
            return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
        }
    }
    public function logout(Request $request)
    {
        // 1. Keluarkan user dari sesi autentikasi
        Auth::logout();

        // 2. Invalidate session (penting untuk keamanan)
        $request->session()->invalidate();

        // 3. Regenerate token CSRF (penting untuk keamanan)
        $request->session()->regenerateToken();

        // 4. Redirect kembali ke halaman login (atau dashboard publik)
        return redirect()->route('dashboard')->with('success', 'Anda telah logout.');
    }
}
