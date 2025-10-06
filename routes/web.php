<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukHukumController;

Route::get('/', function () {
    return view('welcome');
});
 // ini kalau mau akses lewat url browser
 Route::get('/produkHukum',[ProdukHukumController::class, 'index']);

 // pertemuan 4
 Route::post('/home/signup' , [HomeController::class, 'signup']);

 Route::get('/auth',[AuthController::class, 'index']);
 Route::post('/auth/login',[AuthController::class, 'login'])->name('');
