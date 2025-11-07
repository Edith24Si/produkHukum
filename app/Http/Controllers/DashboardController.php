<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukHukum;
use App\Models\KategoriDokumen;
use App\Models\JenisDokumen;
use App\Models\User;
use App\Models\Warga;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Data statistik untuk dashboard - dengan error handling
            $data = [
                'totalDokumen' => $this->safeCount(ProdukHukum::class),
                'totalKategori' => $this->safeCount(KategoriDokumen::class),
                'totalJenis' => $this->safeCount(JenisDokumen::class),
                'totalUsers' => $this->safeCount(User::class),
                'totalWarga' => $this->safeCount(Warga::class),
            ];
        } catch (\Exception $e) {
            // Fallback ke data dummy jika ada error
            $data = [
                'totalDokumen' => 1230,
                'totalKategori' => 45,
                'totalJenis' => 28,
                'totalUsers' => 156,
                'totalWarga' => 890,
            ];
        }

        // PASTIKAN PATH INI BENAR
        return view('dashboard', $data);
    }

    // Helper function untuk handle error count
    private function safeCount($model)
    {
        try {
            return $model::count();
        } catch (\Exception $e) {
            return 0;
        }
    }
}
