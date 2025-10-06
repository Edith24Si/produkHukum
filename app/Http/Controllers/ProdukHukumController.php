<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukHukumController extends Controller
{
    public function index()
    {
        $produkHukum = [
            [
                'nomor' => '01/2025',
                'judul' => 'Peraturan Daerah tentang Kesehatan',
                'tanggal' => '2025-01-15',
                'ringkasan' => 'Mengatur layanan kesehatan masyarakat tingkat daerah.',
                'status' => 'Aktif',
                'foto' => 'produk1.jpg',
                'file' => 'dokumen1.pdf'
            ],
            [
                'nomor' => '02/2025',
                'judul' => 'Peraturan Daerah tentang Pendidikan',
                'tanggal' => '2025-02-01',
                'ringkasan' => 'Mengatur standar kurikulum pendidikan daerah.',
                'status' => 'Aktif',
                'foto' => 'produk2.jpg',
                'file' => 'dokumen2.pdf'
            ]
        ];

        return view('Admin.produkHukum', compact('produkHukum'));
    }
}
