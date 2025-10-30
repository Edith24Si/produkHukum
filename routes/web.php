<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukHukumController;
use App\Http\Controllers\JenisDokumenController;
use App\Http\Controllers\KategoriDokumenController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\UserController;
// use App\Models\KategoriDokumen;, tidak diperlukan di file rute

Route::get('/', function () {
    return redirect()->route('auth.login');
});

Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'processRegister'])->name('register.process');

// RUTE ADMIN
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    // Route::get('/success', [AuthController::class, 'success'])->name('auth.success'), tidak perlu lagi

    // Produk Hukum
    // VERSI BARU (PERBAIKAN)
    Route::resource('produk-hukum', ProdukHukumController::class)
        ->names('produkHukum')
        ->parameter('produk-hukum', 'produk'); 
    // Jenis Dokumen
    Route::resource('jenis_dokumen', JenisDokumenController::class);

    // Kategori Dokumen
    Route::resource('kategori_dokumen', KategoriDokumenController::class);
    Route::resource('kategori_dokumen', KategoriDokumenController::class);
    Route::resource('warga', WargaController::class); // <-- TAMBAHKAN INI
    Route::resource('user', UserController::class);
});