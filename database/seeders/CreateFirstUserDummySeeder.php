<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class CreateFirstUserDummySeeder extends Seeder
{
    public function run()
    {
        // 1. UPDATE atau CREATE akun ADMIN
        // Kita gunakan updateOrCreate agar jika user admin@hukum.com sudah ada,
        // datanya (terutama ROLE) akan dipaksa update menjadi 'admin'.
        User::updateOrCreate(
            ['email' => 'admin@hukum.com'], // Kunci pencarian (Cek email ini)
            [
                'name' => 'Admin Hukum',
                'username' => 'adminhukum',
                'password' => Hash::make('password123'), // Password default
                'role' => 'admin', // <--- PENTING: Paksa role jadi admin
            ]
        );

        $this->command->info("User 'Admin Hukum' (Role: admin) siap. Silakan login.");

        // 2. Buat User Biasa (Opsional, untuk testing akses ditolak)
        // Gunakan akun ini nanti untuk mengetes apakah middleware checkrole bekerja
        User::updateOrCreate(
            ['email' => 'warga@hukum.com'],
            [
                'name' => 'Warga Biasa',
                'username' => 'wargabiasa',
                'password' => Hash::make('password'),
                'role' => 'user', // Role: user (bukan admin)
            ]
        );

        // 3. Membuat 20 akun DUMMY acak (Role User)
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 20; $i++) {
            // Pastikan username & email unik agar tidak error saat seeding ulang
            $email = $faker->unique()->safeEmail;

            // Cek manual sederhana biar gak duplikat
            if (!User::where('email', $email)->exists()) {
                User::create([
                    'name' => $faker->name,
                    'username' => $faker->unique()->userName,
                    'email' => $email,
                    'password' => Hash::make('password'),
                    'role' => 'user', // Default role user
                ]);
            }
        }

        $this->command->info('Berhasil membuat user dummy tambahan.');
    }
}
