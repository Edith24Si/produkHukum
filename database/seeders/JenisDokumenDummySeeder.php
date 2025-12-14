<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisDokumen;
use Faker\Factory as Faker;

class JenisDokumenDummySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Data pasti jenis dokumen hukum Indonesia
        $jenisFix = [
            [
                'nama_jenis' => 'Peraturan Desa',
                'deskripsi' => 'Peraturan yang ditetapkan oleh Kepala Desa setelah dibahas dan disepakati bersama Badan Permusyawaratan Desa'
            ],
            [
                'nama_jenis' => 'Peraturan Kepala Desa',
                'deskripsi' => 'Peraturan yang ditetapkan oleh Kepala Desa untuk melaksanakan Peraturan Desa'
            ],
            [
                'nama_jenis' => 'Keputusan Kepala Desa',
                'deskripsi' => 'Keputusan yang dikeluarkan oleh Kepala Desa sebagai pelaksanaan tugas dan wewenang'
            ],
            [
                'nama_jenis' => 'Surat Edaran',
                'deskripsi' => 'Surat yang berisi petunjuk atau penjelasan tentang pelaksanaan suatu peraturan'
            ],
            [
                'nama_jenis' => 'Instruksi Kepala Desa',
                'deskripsi' => 'Perintah atau arahan dari Kepala Desa kepada perangkat desa'
            ],
            [
                'nama_jenis' => 'Peraturan Bersama',
                'deskripsi' => 'Peraturan yang ditetapkan bersama antara Desa dengan pihak terkait'
            ]
        ];

        foreach ($jenisFix as $jenis) {
            JenisDokumen::firstOrCreate(
                ['nama_jenis' => $jenis['nama_jenis']],
                ['deskripsi' => $jenis['deskripsi']]
            );
        }

        // Sisanya dummy dengan istilah Indonesia
        $jenisLain = [
            'Pengumuman Resmi', 'Nota Kesepahaman', 'Berita Acara', 'Laporan Tahunan',
            'Rencana Kerja', 'Anggaran Pendapatan dan Belanja Desa', 'Perjanjian Kerja Sama',
            'Standar Pelayanan Minimal', 'Prosedur Operasional Standar', 'Pedoman Teknis'
        ];

        for ($i = 0; $i < 100; $i++) {
            $namaJenis = $jenisLain[$i] ?? 'Dokumen ' . ucfirst($faker->word()) . ' Desa';
            JenisDokumen::create([
                'nama_jenis' => $namaJenis,
                'deskripsi' => $this->generateDeskripsiJenis($namaJenis, $faker),
            ]);
        }

        $this->command->info('Berhasil membuat data Jenis Dokumen dengan istilah Indonesia.');
    }

    private function generateDeskripsiJenis($namaJenis, $faker): string
    {
        $template = [
            "Dokumen yang berisi ketentuan tentang %s dalam penyelenggaraan pemerintahan desa.",
            "Berisi aturan pelaksanaan %s sesuai dengan peraturan perundang-undangan yang berlaku.",
            "Sebagai pedoman dalam %s guna mewujudkan tata kelola pemerintahan yang baik.",
            "Mengatur mekanisme %s untuk meningkatkan efektivitas dan efisiensi pelayanan.",
            "Dokumen resmi yang menetapkan %s sebagai bagian dari administrasi desa."
        ];

        $kataKunci = strtolower($namaJenis);
        return sprintf($faker->randomElement($template), $kataKunci);
    }
}
