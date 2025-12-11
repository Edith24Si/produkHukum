<?php

namespace Database\Seeders;

use App\Models\Warga;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CreateWargaDummySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 50; $i++) {

            // Simpan nama ke variabel dulu
            $namaWarga = $faker->name;

            Warga::create([
                'nama' => $namaWarga, // Panggil variabel yg benar
                'no_ktp' => $faker->unique()->numerify('16##00######000#'), // Format NIK Indonesia
                'email' => $faker->unique()->safeEmail, // Gunakan huruf kecil 'email'
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'pekerjaan' => $faker->jobTitle,
                // Tambahkan field lain jika ada di migration (misal: alamat, tgl_lahir)
            ]);
        }

        $this->command->info('Berhasil membuat 50 data dummy untuk Warga.');
    }
}