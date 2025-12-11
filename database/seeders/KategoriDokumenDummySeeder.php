<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriDokumen;
use Faker\Factory as Faker;

class KategoriDokumenDummySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Data pasti
        $kategoriFix = ['Hukum Pidana', 'Hukum Perdata', 'Administrasi'];
        foreach ($kategoriFix as $k) {
            KategoriDokumen::firstOrCreate(['nama' => $k], ['deskripsi' => 'Deskripsi ' . $k]);
        }

        // Data dummy
        for ($i = 0; $i < 20; $i++) {
            $namaKategori = 'Kategori ' . ucfirst($faker->unique()->word());
            KategoriDokumen::create([
                'nama' => $namaKategori,
                'deskripsi' => $faker->sentence(6),
            ]);
        }

        $this->command->info('Berhasil membuat data Kategori Dokumen.');
    }
}