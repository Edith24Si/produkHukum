<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokumen;
use App\Models\JenisDokumen;
use App\Models\KategoriDokumen;
use Faker\Factory as Faker;

class DokumenDummySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil ID dari tabel relasi (Asumsi Primary Key adalah 'id')
        // JIKA Migration Anda pakai 'jenis_id', ganti pluck('id') jadi pluck('jenis_id')
        $jenisDokumenIds = JenisDokumen::pluck('id')->toArray();
        $kategoriDokumenIds = KategoriDokumen::pluck('id')->toArray();

        if (empty($jenisDokumenIds) || empty($kategoriDokumenIds)) {
            $this->command->error('Error: Tabel Jenis atau Kategori kosong. Jalankan seedernya dulu.');
            return;
        }

        for ($i = 0; $i < 50; $i++) {
            Dokumen::create([
                'judul' => 'Peraturan Tentang ' . $faker->sentence(3),
                'nomor' => $faker->unique()->numberBetween(100, 999) . '/DESA/' . $faker->year,
                'tahun' => $faker->year,
                'tanggal_penetapan' => $faker->date(),
                'jenis_dokumen_id' => $faker->randomElement($jenisDokumenIds),
                'kategori_dokumen_id' => $faker->randomElement($kategoriDokumenIds),
                // Field tambahan sesuai migrasi terakhir
                'status' => $faker->randomElement(['Berlaku', 'Tidak Berlaku']),
                'ringkasan' => $faker->paragraph,
            ]);
        }

        $this->command->info('Berhasil membuat 50 data Dokumen Hukum.');
    }
}