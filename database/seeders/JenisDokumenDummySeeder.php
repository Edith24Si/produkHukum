<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisDokumen;
use Faker\Factory as Faker;

class JenisDokumenDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 100; $i++) {

            $namaJenis = 'Jenis ' . ucfirst($faker->unique()->word()) . ' ' . $faker->randomNumber(3);

            JenisDokumen::create([
                'nama_jenis' => $namaJenis,
                'deskripsi'  => 'Deskripsi untuk ' . $namaJenis . ': ' . $faker->sentence(6),
            ]);
        }

        $this->command->info('Berhasil membuat 100 data dummy untuk Jenis Dokumen.');
    }
}
