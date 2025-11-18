<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\KategoriDokumen; // Asumsi nama model Anda

class KategoriDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data kategori dokumen statis
        $kategoriDokumens = [
            ['nama' => 'Keuangan Daerah'],
            ['nama' => 'Pemerintahan Umum'],
            ['nama' => 'Pembangunan'],
            ['nama' => 'Kesehatan dan Pendidikan'],
            ['nama' => 'Ketatalaksanaan'],
        ];

        foreach ($kategoriDokumens as $data) {
            // Menggunakan firstOrCreate untuk mencegah duplikasi berdasarkan 'nama'
            KategoriDokumen::firstOrCreate(
                ['nama' => $data['nama']],
                $data
            );
        }

        $this->command->info('Data kategori dokumen berhasil di-seed.');
    }
}
