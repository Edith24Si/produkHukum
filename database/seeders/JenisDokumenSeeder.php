<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\JenisDokumen;

class JenisDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenisDokumens = [
            // UBAH KUNCI DARI 'nama' menjadi 'nama_jenis'
            ['nama_jenis' => 'Peraturan Daerah', 'kode' => 'PERDA', 'deskripsi' => 'Peraturan yang ditetapkan oleh DPRD bersama Kepala Daerah.'],
            ['nama_jenis' => 'Peraturan Kepala Daerah', 'kode' => 'PERKADA', 'deskripsi' => 'Peraturan yang ditetapkan oleh Kepala Daerah.'],
            ['nama_jenis' => 'Keputusan Kepala Daerah', 'kode' => 'KEPKADA', 'deskripsi' => 'Keputusan yang bersifat penetapan.'],
            ['nama_jenis' => 'Instruksi Kepala Daerah', 'kode' => 'INKADA', 'deskripsi' => 'Instruksi pelaksanaan kebijakan.'],
        ];

        foreach ($jenisDokumens as $data) {
            // Gunakan firstOrCreate dengan KUNCI 'nama_jenis'
            JenisDokumen::firstOrCreate(
                ['nama_jenis' => $data['nama_jenis']], // <-- KUNCI PENCARIAN
                [
                    // Data yang benar-benar ada di tabel migrasi Anda
                    'nama_jenis' => $data['nama_jenis'],
                    'deskripsi' => $data['deskripsi'] ?? null, // Sesuaikan jika 'deskripsi' tidak ada di data awal
                    // Kolom 'kode' kita hapus dari INSERT karena tidak ada di tabel jenis_dokumen
                ]
            );
        }

        $this->command->info('Data jenis dokumen berhasil di-seed.');
    }
}
