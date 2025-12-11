<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where( 'email', $request->email)->first();
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