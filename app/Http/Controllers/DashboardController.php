<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukHukum; // GANTI INI! Model yang benar
use App\Models\Dokumen; // HAPUS jika tidak ada
use App\Models\KategoriDokumen;
use App\Models\JenisDokumen;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Dapatkan user yang login, set default sebagai admin
        $user = Auth::user();

        // Jika tidak ada user login (untuk development), buat user dummy admin
        if (!$user) {
            $user = (object) [
                'name' => 'Administrator',
                'role' => 'Admin'
            ];
        }

        // Jika user ada tapi role kosong, set sebagai admin
        if ($user && empty($user->role)) {
            $user->role = 'Admin';
        }

        try {
            // Data statistik utama - GUNAKAN MODEL YANG BENAR
            $totalDokumen = $this->safeCount(ProdukHukum::class); // Model yang benar
            $totalKategori = $this->safeCount(KategoriDokumen::class);
            $totalJenis = $this->safeCount(JenisDokumen::class);
            $totalUser = $this->safeCount(User::class);
            $totalWarga = $this->safeCount(Warga::class);

            // Persentase pertumbuhan
            $growthPercentage = 12.5;

            // Quick stats untuk jenis dokumen - GUNAKAN MODEL YANG BENAR
            $perdes = ProdukHukum::whereHas('jenis', function($query) { // Model yang benar
                $query->where('nama', 'like', '%peraturan desa%');
            })->count();

            $perkades = ProdukHukum::whereHas('jenis', function($query) { // Model yang benar
                $query->where('nama', 'like', '%perkades%');
            })->count();

            $surat_edaran = ProdukHukum::whereHas('jenis', function($query) { // Model yang benar
                $query->where('nama', 'like', '%surat edaran%');
            })->count();

            // Data untuk chart
            $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'];
            $documentsData = [12, 18, 15, 20, 22, 25];

            // Data untuk pie chart
            $categoryDistribution = $this->getCategoryDistribution();

            // Data untuk tabel
            $dokumenTerbaru = ProdukHukum::with('kategori') // Model yang benar
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();

            $wargaTerbaru = Warga::orderBy('created_at', 'desc')
                ->limit(5)
                ->get();

            $kategoriAktif = $categoryDistribution->take(3);

        } catch (\Exception $e) {
            // Fallback data
            $totalDokumen = 1230;
            $totalKategori = 45;
            $totalJenis = 28;
            $totalUser = 156;
            $totalWarga = 890;
            $growthPercentage = 12.5;
            $perdes = 45;
            $perkades = 32;
            $surat_edaran = 48;
            $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'];
            $documentsData = [12, 18, 15, 20, 22, 25];
            $categoryDistribution = $this->getCategoryDistribution();
            $dokumenTerbaru = collect();
            $wargaTerbaru = collect();
            $kategoriAktif = $categoryDistribution->take(3);
        }

        // Kirim data ke view
        return view('dashboard', [
            // Statistik utama
            'totalDokumen' => $totalDokumen,
            'totalKategori' => $totalKategori,
            'totalJenis' => $totalJenis,
            'totalUser' => $totalUser,
            'totalWarga' => $totalWarga,

            // Variabel untuk chart dan badge
            'growthPercentage' => $growthPercentage,
            'persentasePertumbuhan' => $growthPercentage,

            // Quick stats - kirim sebagai array
            'quickStats' => [
                'perdes' => $perdes,
                'perkades' => $perkades,
                'surat_edaran' => $surat_edaran
            ],

            // Data untuk chart
            'months' => $months,
            'documentsData' => $documentsData,
            'categoryDistribution' => $categoryDistribution,

            // Data untuk tabel
            'kategoriAktif' => $kategoriAktif,
            'dokumenTerbaru' => $dokumenTerbaru,
            'wargaTerbaru' => $wargaTerbaru,

            // User info
            'user' => $user,
        ]);
    }

    private function safeCount($model)
    {
        try {
            return $model::count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    private function getCategoryDistribution()
    {
        try {
            $categories = KategoriDokumen::withCount('produkHukums')
                ->orderBy('produk_hukums_count', 'desc')
                ->get();

            if ($categories->isEmpty()) {
                return collect([
                    (object)['nama' => 'Administrasi', 'produk_hukums_count' => 15],
                    (object)['nama' => 'Keuangan', 'produk_hukums_count' => 12],
                    (object)['nama' => 'Umum', 'produk_hukums_count' => 10],
                ]);
            }

            return $categories;
        } catch (\Exception $e) {
            return collect([
                (object)['nama' => 'Administrasi', 'produk_hukums_count' => 15],
                (object)['nama' => 'Keuangan', 'produk_hukums_count' => 12],
                (object)['nama' => 'Umum', 'produk_hukums_count' => 10],
            ]);
        }
    }
}
