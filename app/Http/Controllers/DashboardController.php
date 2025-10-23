<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukHukum;
use App\Models\KategoriDokumen;
use App\Models\JenisDokumen;
use App\Models\LampiranDokumen;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDokumen = ProdukHukum::count();

        $bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'];
        $jumlah = [5, 10, 8, 15, 7, 9];

        $persen = [];
        for ($i = 1; $i < count($jumlah); $i++) {
            $selisih = $jumlah[$i] - $jumlah[$i - 1];
            $persen[] = round(($selisih / $jumlah[$i - 1]) * 100, 1);
        }
        array_unshift($persen, 0);

        return view('dashboard.index', compact(
            'totalDokumen'
        ));
    }
}
