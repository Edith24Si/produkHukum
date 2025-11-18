<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KategoriDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengatasi error Foreign Key: Nonaktifkan checks dan gunakan DELETE
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Hapus data lama (lebih aman menggunakan delete() daripada truncate() pada kasus ini)
        DB::table('kategori_dokumen')->delete();

        // Data kategori dokumen yang umum digunakan
        $kategori_dokumen = [
            'Keuangan Daerah',
            'Pembangunan',
            'Kesehatan',
            'Pendidikan',
            'Kesejahteraan Sosial',
            'Perizinan',
            'Tata Ruang',
        ];

        foreach ($kategori_dokumen as $nama) {
            DB::table('kategori_dokumen')->insert([
                // KOREKSI: Mengganti 'nama_kategori' menjadi 'nama'
                'nama' => $nama,
                'deskripsi' => 'Dokumen yang diklasifikasikan dalam kategori ' . $nama . '.',
            ]);
        }

        // Aktifkan kembali Foreign Key Check
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $this->command->info('Data kategori dokumen berhasil di-seed dengan kategori umum.');
    }
}
