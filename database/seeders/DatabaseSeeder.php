<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder sesuai urutan relasi (Parent dulu baru Child)
        $this->call([
            CreateFirstUserDummySeeder::class, // User Admin & Dummy
            JenisDokumenDummySeeder::class,    // Data Master Jenis
            KategoriDokumenDummySeeder::class, // Data Master Kategori
            DokumenDummySeeder::class,         // Data Dokumen (Butuh Jenis & Kategori)
            CreateWargaDummySeeder::class,     // Data Warga
        ]);
    }
}