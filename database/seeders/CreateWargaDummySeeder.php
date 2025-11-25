<?php

namespace Database\Seeders;

use App\Models\Warga;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateWargaDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Membuat instance Faker dengan locale Indonesia
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 100; $i++) {

            $namaWarga = 'Warga ' . ucfirst($faker->unique()->word()) . ' ' . $faker->randomNumber(3);

            Warga::create([
                'nama' => $nama,

                // Menambahkan field 'no_ktp' yang diwajibkan oleh database
                'no_ktp' => $faker->unique()->numerify('################'), // Menghasilkan 16 digit angka unik
                'Email'  => 'Email untuk ' . $namaWarga . ': ' . $faker->sentence(6),
                 'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                  'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                   'pekerjaan' => $faker->jobTitle,

            ]);
        }

        $this->command->info('Berhasil membuat 100 data dummy untuk Warga.');
    }
}
