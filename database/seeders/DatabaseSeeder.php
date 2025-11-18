<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Panggil semua seeder yang Anda buat
       $this->call([
        CreateFirstUser::class,
        JenisDokumenSeeder::class,
        KategoriDokumenSeeder::class,
        DokumenDummySeeder::class, // <-- TAMBAHKAN INI
    ]);
    }
}
