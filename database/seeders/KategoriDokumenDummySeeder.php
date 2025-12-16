<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriDokumen;
use Faker\Factory as Faker;

class KategoriDokumenDummySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Data pasti kategori dokumen hukum Indonesia
        $kategoriFix = [
            [
                'nama' => 'Hukum Pemerintahan',
                'deskripsi' => 'Dokumen yang mengatur tentang tata kelola pemerintahan desa'
            ],
            [
                'nama' => 'Hukum Administrasi',
                'deskripsi' => 'Dokumen terkait administrasi dan pelayanan publik'
            ],
            [
                'nama' => 'Hukum Keuangan',
                'deskripsi' => 'Dokumen pengelolaan keuangan dan anggaran desa'
            ],
            [
                'nama' => 'Hukum Pembangunan',
                'deskripsi' => 'Dokumen perencanaan dan pelaksanaan pembangunan desa'
            ],
            [
                'nama' => 'Hukum Sosial Kemasyarakatan',
                'deskripsi' => 'Dokumen yang mengatur kehidupan sosial masyarakat'
            ],
            [
                'nama' => 'Hukum Lingkungan',
                'deskripsi' => 'Dokumen pengelolaan dan perlindungan lingkungan hidup'
            ]
        ];

        foreach ($kategoriFix as $kategori) {
            KategoriDokumen::firstOrCreate(
                ['nama' => $kategori['nama']],
                ['deskripsi' => $kategori['deskripsi']]
            );
        }

        // Kategori tambahan dengan istilah Indonesia
        $kategoriLain = [
            'Perencanaan', 'Pengawasan', 'Pelaporan', 'Evaluasi', 'Monitoring',
            'Pengadaan Barang/Jasa', 'Kerja Sama', 'Badan Usaha Milik Desa',
            'Pemberdayaan Masyarakat', 'Pelestarian Adat Istiadat'
        ];

        for ($i = 0; $i < 50; $i++) {
            $namaKategori = $kategoriLain[$i] ?? 'Kategori ' . ucfirst($faker->word());
            KategoriDokumen::create([
                'nama' => $namaKategori,
                'deskripsi' => "Kategori dokumen yang terkait dengan $namaKategori dalam konteks pemerintahan desa",
            ]);
        }

        $this->command->info('Berhasil membuat data Kategori Dokumen dengan istilah Indonesia.');
    }
}
