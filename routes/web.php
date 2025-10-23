<?php

<<<<<<< HEAD
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukHukumController;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/produk-hukum', [ProdukHukumController::class, 'index'])->name('produk.index');

Route::resource('produk', ProdukHukumController::class);
=======
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukHukumController;

// 🔹 Redirect otomatis ke halaman login
Route::get('/', function () {
    return redirect()->route('auth.login');
});

// 🔹 AUTH ROUTES
Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/success', [AuthController::class, 'success'])->name('auth.success');

// (opsional) halaman register
Route::get('/register', [AuthController::class, 'registerForm'])->name('auth.register.form');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

// 🔹 DASHBOARD — hanya bisa diakses setelah login
Route::get('/dashboard', function () {
    if (!session()->has('username')) {
        return redirect()->route('auth.login')->with('error', 'Anda belum login!');
    }
    return view('auth.dashboard'); // file: resources/views/auth/dashboard.blade.php
})->name('dashboard');

// 🔹 PRODUK HUKUM — halaman utama setelah login
Route::get('/produk-Hukum', [ProdukHukumController::class, 'index'])
    ->name('produkHukum.index');
>>>>>>> d98a2e4ed5a3859b229062c23f7381523f9e6416
