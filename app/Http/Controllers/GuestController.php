<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Menampilkan halaman Home/Beranda (Guest)
     */
    public function index()
    {
        return view('home_guest');
    }
}