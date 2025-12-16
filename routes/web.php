<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukHukumController;
use App\Http\Controllers\JenisDokumenController;
use App\Http\Controllers\TimPengembangController;
use App\Http\Controllers\KategoriDokumenController;
use App\Http\Controllers\LampiranDokumenController;
use App\Http\Controllers\RiwayatPerubahanController;
use App\Http\Controllers\WargaController; // Tambahkan ini agar lebih rapi

// ====================================================
// 1. RUTE PUBLIK (Bisa Diakses Siapa Saja / Tamu)
// ====================================================

// Redirect root ke dashboard publik
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Otentikasi (Login & Register)
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'processRegister'])->name('register.process');

// Dashboard & Baca Data (Agar tamu bisa melihat data tanpa login)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/produk_hukum', [ProdukHukumController::class, 'index'])->name('produkHukum.index');
// Cari baris ini di bagian RUTE PUBLIK (sekitar baris 30-an)
Route::get('/produk_hukum/{id?}', [ProdukHukumController::class, 'show'])
    ->name('produkHukum.show');

// ====================================================
// 2. RUTE YANG BUTUH LOGIN (Middleware: checkislogin)
// ====================================================
// Route::group(['middleware' => ['checkislogin']], function () {

// HANYA POST UNTUK LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// OPTIONAL: Redirect GET /logout ke login
Route::get('/logout', function () {
    return redirect()->route('login');
});

// Manajemen Profil (Semua user yang login bisa edit profil sendiri)
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile-picture', [ProfileController::class, 'destroy'])->name('profile.destroy');

// ====================================================
// 3. RUTE KHUSUS ADMIN (Middleware: checkrole:admin)
// ====================================================
// Hanya user dengan kolom role = 'admin' yang bisa mengakses ini
// Route::group(['middleware' => ['checkrole:admin']], function () {

// --- CRUD Produk Hukum (Create, Edit, Delete) ---
// Note: Index dan Show sudah ada di Public di atas
Route::get('/produk_hukum/create', [ProdukHukumController::class, 'create'])->name('produkHukum.create');
Route::post('/produk_hukum', [ProdukHukumController::class, 'store'])->name('produkHukum.store');
Route::get('/produk_hukum/{id?}/edit', [ProdukHukumController::class, 'edit'])->name('produkHukum.edit');
Route::put('/produk_hukum/{id}', [ProdukHukumController::class, 'update'])->name('produkHukum.update');
Route::delete('/produk_hukum/{id?}', [ProdukHukumController::class, 'destroy'])->name('produkHukum.destroy');

// --- Master Data (Resources) ---
Route::resource('jenis_dokumen', JenisDokumenController::class);
Route::resource('kategori_dokumen', KategoriDokumenController::class);
Route::resource('warga', WargaController::class);
Route::resource('user', UserController::class);

// --- Lampiran Dokumen ---
Route::resource('lampiran-dokumen', LampiranDokumenController::class)->names('lampiranDokumen');

// --- Media (Upload File Pendukung) ---
Route::post('/media/store', [MediaController::class, 'store'])->name('media.store');
Route::delete('/media/{id}', [MediaController::class, 'destroy'])->name('media.destroy');
// });

// });

Route::get('/tim-pengembang', [TimPengembangController::class, 'index'])->name('tim-pengembang');


// Route untuk riwayat perubahan
    Route::get('/riwayat-perubahan', [RiwayatPerubahanController::class, 'index'])->name('riwayat-perubahan.index');
    Route::get('/riwayat-perubahan/{riwayatPerubahan}', [RiwayatPerubahanController::class, 'show'])->name('riwayat-perubahan.show');

