<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker; // Ini sudah benar

class CreateFirstUserDummySeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Membuat akun ADMIN (dibuat hanya SATU KALI)
        // Perbaiki: Tambahkan 'username' dan letakkan di luar perulangan.
        User::create([
            'name' => 'Admin Hukum',
            'username' => 'adminhukum', // <--- Tambahkan username
            'email' => 'admin@email.com',
            'password' => Hash::make('admin123'),
        ]);

        echo "User 'Admin Hukum' berhasil dibuat.\n";


        // 2. Membuat 100 akun DUMMY (menggunakan perulangan)
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 100; $i++) {
            $namaUser = 'User ' . ucfirst($faker->unique()->word()) . ' ' . $faker->randomNumber(3);

            // Perbaiki: User::create HARUS dipanggil di dalam perulangan
            // dan menggunakan data dari $faker untuk data dummy.
            User::create([
                'name' => $namaUser,
                // Gunakan faker untuk username, pastikan unique
                'username' => $faker->unique()->userName(),
                'email' => $faker->unique()->safeEmail(),
                // Password default untuk dummy user
                'password' => Hash::make('password'),
            ]);
        }

        echo "Berhasil membuat 100 User Dummy.\n";
    }
}
