<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        // --- UBAH BARIS INI ---
        return view('pages.guest.home');
    }

    public function tentang()
    {
        // Nanti Anda bisa buat file ini: pages/guest/tentang.blade.php
        return view('pages.guest.tentang');
    }

    public function layanan()
    {
        // Nanti Anda bisa buat file ini: pages/guest/layanan.blade.php
        return view('pages.guest.layanan');
    }

    public function kontak()
    {
        // Nanti Anda bisa buat file ini: pages/guest/kontak.blade.php
        return view('pages.guest.kontak');
    }
}
