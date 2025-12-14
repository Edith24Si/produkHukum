<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiwayatPerubahan;
use App\Models\Dokumen;
use Faker\Factory as Faker;

class RiwayatPerubahanDummySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil beberapa dokumen
        $dokumens = Dokumen::inRandomOrder()->limit(30)->get();

        if ($dokumens->isEmpty()) {
            $this->command->error('Tidak ada dokumen untuk membuat riwayat perubahan');
            return;
        }

        $versi = ['1.0', '1.1', '1.2', '2.0', '2.1', '3.0'];
        $perubahan = [
            'Perubahan pada pasal tentang tata cara pengelolaan dana',
            'Revisi tarif retribusi pelayanan publik',
            'Penambahan pasal baru tentang pengawasan',
            'Perubahan masa berlaku dokumen',
            'Koreksi kesalahan penulisan',
            'Penyesuaian dengan peraturan baru',
            'Perubahan struktur organisasi',
            'Penambahan lampiran dokumen',
            'Revisi format penomoran',
            'Pembaruan data pendukung'
        ];

        foreach ($dokumens as $dokumen) {
            // Buat 2-5 riwayat perubahan per dokumen
            $jumlahRiwayat = rand(2, 5);

            for ($i = 0; $i < $jumlahRiwayat; $i++) {
                $tanggal = $faker->dateTimeBetween($dokumen->created_at, 'now');

                RiwayatPerubahan::create([
                    'dokumen_id' => $dokumen->dokumen_id,
                    'tanggal' => $tanggal,
                    'uraian_perubahan' => $faker->randomElement($perubahan),
                    'versi' => $versi[$i],
                    'created_at' => $tanggal,
                    'updated_at' => $tanggal,
                ]);
            }
        }

        $this->command->info('Berhasil membuat data dummy riwayat perubahan.');
    }
}
