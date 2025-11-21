<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokumen;
use App\Models\JenisDokumen;
use App\Models\KategoriDokumen; // Import Model KategoriDokumen
use Faker\Factory as Faker; // Import class Faker

class DokumenDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Inisialisasi Faker dengan locale Indonesia
        $faker = Faker::create('id_ID');

        // Ambil ID dari Jenis Dokumen yang sudah ada
        $jenisDokumenIds = JenisDokumen::pluck('id')->toArray();
        // 2. UNCOMMENT DAN AMBIL ID KategoriDokumen
        $kategoriDokumenIds = KategoriDokumen::pluck('id')->toArray();

        // Pastikan array tidak kosong
        if (empty($jenisDokumenIds) || empty($kategoriDokumenIds)) {
            $this->command->info('Pastikan Anda sudah menjalankan JenisDokumenSeeder dan KategoriDokumenSeeder terlebih dahulu.');
            return;
        }

        for ($i = 0; $i < 50; $i++) {
            Dokumen::create([
                // Judul akan menggunakan kalimat Bahasa Indonesia
                'judul' => 'Peraturan Tentang di Indonesia' . $faker->sentence(5),
                'nomor' => $faker->numberBetween(1, 100),
                'tahun' => $faker->numberBetween(2010, 2025),
                'tanggal_penetapan' => $faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
                'jenis_dokumen_id' => $faker->randomElement($jenisDokumenIds),
                // 3. TAMBAHKAN DATA UNTUK KATEGORI
                'kategori_dokumen_id' => $faker->randomElement($kategoriDokumenIds),
            ]);
        }
    }
}
