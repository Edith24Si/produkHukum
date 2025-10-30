<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username, 
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended('dashboard') 
                             ->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Username atau password salah.');

        /*
        // --- Logic Statis (di-comment seperti permintaan Anda) ---
        // $usernameBenar = 'edith';
        // $passwordBenar = '123456';
        // if ($request->username === $usernameBenar && $request->password === $passwordBenar) {
        //     $request->session()->put('username', $request->username);
        //     return redirect()->route('produkHukum.index')->with('success', 'Login berhasil!');
        // }
        // return back()->with('error', 'Username atau password salah.');
        */
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('auth.login')->with('success', 'Anda telah logout.');
    }

    /**
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     */
    public function processRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,name', 
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->username, 
            'username' => $request->username, 
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('auth.login')
                         ->with('success', 'Registrasi berhasil! Silakan login.');
    }
    /**
     * Halaman dashboard
     * * CATATAN: Fungsi ini tidak lagi digunakan karena
     * rute '/dashboard' Anda sekarang dilindungi oleh middleware
     * (Akan kita perbaiki di file web.php)
     */
    public function dashboard()
    {
        // Logic ini sebaiknya dipindah ke middleware
        return view('dashboard');
    }
}