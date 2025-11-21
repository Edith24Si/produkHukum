<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JenisDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PENTING: Nonaktifkan Foreign Key Checks untuk memungkinkan DELETE
        // Ini adalah solusi untuk error 'Cannot truncate a table referenced in a foreign key constraint'
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Hapus data lama (Menggunakan delete() lebih aman daripada truncate() pada kasus ini)
        DB::table('jenis_dokumen')->delete();

        // Data jenis dokumen statis yang umum digunakan
        $jenis_dokumen = [
            'Undang-Undang',
            'Peraturan Pemerintah',
            'Peraturan Presiden',
            'Peraturan Daerah',
            'Peraturan Walikota',
            'Keputusan Walikota',
            'Instruksi Walikota',
            'Surat Edaran',
        ];

        foreach ($jenis_dokumen as $nama) {
            DB::table('jenis_dokumen')->insert([
                'nama_jenis' => $nama,
                'deskripsi' => 'Dokumen yang termasuk dalam jenis ' . $nama . '.',
            ]);
        }

        // Aktifkan kembali Foreign Key Check
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $this->command->info('Data jenis dokumen berhasil di-seed dengan jenis-jenis umum.');
    }
}
