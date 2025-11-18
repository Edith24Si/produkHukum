<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen; // Pastikan Anda mengimpor Model Dokumen

class DokumenController extends Controller
{
    /**
     * Menampilkan daftar semua Dokumen.
     */
    public function index()
    {
        // Ambil semua data Dokumen, urutkan berdasarkan tahun terbaru
        // Catatan: Pastikan relasi di Dokumen.php sudah ada jika Anda ingin menampilkan Jenis/Kategori
        $dokumens = Dokumen::orderBy('tahun', 'desc')->paginate(15);

        // KOREKSI: Panggil view sesuai struktur folder Anda: 'pages.produk_hukum.index'
        return view('pages.produk_hukum.index', compact('dokumens'));
    }
}


