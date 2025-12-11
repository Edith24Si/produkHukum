<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisDokumen;
use Faker\Factory as Faker;

class JenisDokumenDummySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Buat beberapa data pasti dulu
        $jenisFix = ['Peraturan Desa', 'Peraturan Kepala Desa', 'Keputusan Kepala Desa'];
        foreach ($jenisFix as $j) {
            JenisDokumen::firstOrCreate(['nama_jenis' => $j], ['deskripsi' => 'Deskripsi ' . $j]);
        }

        // Sisanya dummy acak
        for ($i = 0; $i < 20; $i++) {
            $namaJenis = 'Jenis ' . ucfirst($faker->unique()->word()) . ' ' . $faker->randomNumber(3);
            JenisDokumen::create([
                'nama_jenis' => $namaJenis,
                'deskripsi' => $faker->sentence(6),
            ]);
        }

        $this->command->info('Berhasil membuat data Jenis Dokumen.');
    }
}