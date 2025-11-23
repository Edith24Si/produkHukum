<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriDokumen;
use Faker\Factory as Faker;

class KategoriDokumenDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 100; $i++) {

            $namaKategori = 'Kategori ' . ucfirst($faker->unique()->word()) . ' ' . $faker->randomNumber(3);

            KategoriDokumen::create([
                'nama' => $namaKategori,
                'deskripsi'  => 'Deskripsi untuk ' . $namaKategori . ': ' . $faker->sentence(6),
            ]);
        }

        $this->command->info('Berhasil membuat 100 data dummy untuk Jenis Dokumen.');
    }
}
