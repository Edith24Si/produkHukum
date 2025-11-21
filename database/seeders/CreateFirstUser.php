<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateFirstUser extends Seeder
{
    public function run()
    {
        // Data user administrator pertama
        $userData = [
            'name'     => 'Admin Produk Hukum',
            'email'    => 'admin@hukum.com',
            // --- TAMBAHKAN INI ---
            'username' => 'admin_hukum', // <--- Contoh username unik
            // ---------------------
            'password' => Hash::make('password'),
        ];

        // Membuat user hanya jika belum ada (berdasarkan email)
        User::firstOrCreate(
            ['email' => $userData['email']],
            $userData
        );

        $this->command->info('Akun administrator pertama berhasil dibuat.');
    }
}
