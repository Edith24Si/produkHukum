<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukHukumController;
use App\Http\Controllers\JenisDokumenController;
use App\Http\Controllers\KategoriDokumenController;
use App\Http\Controllers\LampiranDokumenController; // Sudah di-import

Route::get('/', function () {
    return redirect()->route('login');
});

// Otentikasi
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'processRegister'])->name('register.process');

// RUTE ADMIN (Membutuhkan Autentikasi)
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    // --- MANAJEMEN DATA (RESOURCE ROUTES) ---

    // 1. Produk Hukum
    Route::resource('produk-hukum', ProdukHukumController::class)
        ->names('produkHukum')
        ->parameter('produk-hukum', 'produk');

    // 2. Jenis Dokumen
    Route::resource('jenis_dokumen', JenisDokumenController::class);

    // 3. Kategori Dokumen
    Route::resource('kategori_dokumen', KategoriDokumenController::class);

    // 4. Data Warga
    Route::resource('warga', WargaController::class);

    // 5. Manajemen User
    Route::resource('user', UserController::class);

    // 6. Lampiran Dokumen (RESOURCE UNTUK LAMPIRAN DOKUMEN)
    // Resource ini mencakup index(), create(), dan store()
    Route::resource('lampiran-dokumen', LampiranDokumenController::class)->names('lampiranDokumen');

});

// SEMUA ROUTE DUPLIKAT DI BAWAH INI DIHAPUS / DIKOMENTARI
// Route::prefix('lampiran-dokumen')->group(function () {
//     Route::get('/', [LampiranDokumenController::class, 'index'])->name('lampiranDokumen.index');
//     Route::get('/create', [LampiranDokumenController::class, 'create'])->name('lampiranDokumen.create');
//     Route::post('/', [LampiranDokumenController::class, 'store'])->name('lampiranDokumen.store');
// });
