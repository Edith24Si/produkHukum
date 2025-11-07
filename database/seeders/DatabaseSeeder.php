<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\KategoriDokumen;
use App\Models\JenisDokumen;
use App\Models\ProdukHukum;
use App\Models\Warga;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@produkhukum.com',
            'password' => Hash::make('password'),
            'username' => 'admin'
        ]);

        // Kategori Dokumen
        $kategories = [
            ['nama' => 'Peraturan Desa', 'deskripsi' => 'Peraturan yang dikeluarkan oleh desa'],
            ['nama' => 'Keputusan Kepala Desa', 'deskripsi' => 'Keputusan resmi kepala desa'],
            ['nama' => 'Surat Edaran', 'deskripsi' => 'Surat edaran untuk masyarakat'],
        ];

        foreach ($kategories as $kategori) {
            KategoriDokumen::create($kategori);
        }

        // Jenis Dokumen
        $jenisDokumen = [
            ['nama' => 'Peraturan', 'deskripsi' => 'Dokumen peraturan'],
            ['nama' => 'Keputusan', 'deskripsi' => 'Dokumen keputusan'],
            ['nama' => 'Surat', 'deskripsi' => 'Dokumen surat menyurat'],
        ];

        foreach ($jenisDokumen as $jenis) {
            JenisDokumen::create($jenis);
        }

        // Sample Warga
        Warga::create([
            'nama' => 'Ahmad Santoso',
            'nik' => '3271234567890001',
            'alamat' => 'Jl. Merdeka No. 123',
            'no_telepon' => '081234567890'
        ]);

        Warga::create([
            'nama' => 'Siti Rahayu',
            'nik' => '3271234567890002',
            'alamat' => 'Jl. Sudirman No. 45',
            'no_telepon' => '081234567891'
        ]);

        // Sample Produk Hukum
        ProdukHukum::create([
            'judul' => 'Peraturan Desa No. 1 Tahun 2025',
            'deskripsi' => 'Peraturan tentang tata tertib masyarakat',
            'kategori_id' => 1,
            'jenis_id' => 1,
            'tanggal_ditetapkan' => '2025-01-15'
        ]);
    }
}
