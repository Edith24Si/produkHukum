<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateFirstUserSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     *
     * @return void
     */
    public function run()
    {
        // Membuat akun admin pertama dengan kredensial yang diminta.
        User::create([
            'name' => 'Admin hukum',
            'email' => 'admin@email.com',
            // Pastikan password di-hash menggunakan Hash::make()
            'password' => Hash::make('admin123'),
        ]);

        echo "User 'Admin hukum' berhasil dibuat.\n";
    }
}
