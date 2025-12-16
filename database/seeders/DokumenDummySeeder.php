<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokumen;
use App\Models\JenisDokumen;
use App\Models\KategoriDokumen;
use Faker\Factory as Faker;

class DokumenDummySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Data jenis dokumen yang umum di Indonesia
        $jenisDokumenIds = JenisDokumen::pluck('id')->toArray();
        $kategoriDokumenIds = KategoriDokumen::pluck('id')->toArray();

        if (empty($jenisDokumenIds) || empty($kategoriDokumenIds)) {
            $this->command->error('Error: Tabel Jenis atau Kategori kosong. Jalankan seedernya dulu.');
            return;
        }

        // Daftar kata kunci peraturan Indonesia yang umum
        $judulPeraturan = [
            'Tata Tertib', 'Tata Cara', 'Pedoman', 'Petunjuk Teknis', 'Standar Operasional Prosedur',
            'Pengelolaan', 'Penggunaan', 'Pemanfaatan', 'Pengawasan', 'Pengendalian',
            'Penataan', 'Pembinaan', 'Pemberdayaan', 'Pelayanan', 'Perlindungan',
            'Pengembangan', 'Penyelenggaraan', 'Penanggulangan', 'Pencegahan', 'Penertiban'
        ];

        $obyekPeraturan = [
            'Aset Desa', 'Tanah Kas Desa', 'Badan Usaha Milik Desa', 'Anggaran Pendapatan dan Belanja Desa',
            'Pelayanan Publik', 'Lingkungan Hidup', 'Ketertiban Umum', 'Kesehatan Masyarakat',
            'Pendidikan', 'Pariwisata', 'Perdagangan', 'Pertanian', 'Perikanan', 'Peternakan',
            'Perumahan', 'Infrastruktur', 'Transportasi', 'Komunikasi', 'Energi', 'Air Bersih'
        ];

        $wilayah = [
            'Desa', 'Kelurahan', 'Kecamatan', 'Kabupaten', 'Daerah', 'Wilayah', 'Kawasan',
            'Lingkungan', 'RT', 'RW', 'Dusun', 'Kampung', 'Nagari', 'Lembang'
        ];

        // Buat 100 data dokumen dengan istilah Indonesia
        for ($i = 0; $i < 50; $i++) {
            $jenisDokumen = $faker->randomElement(['Peraturan Desa', 'Peraturan Kepala Desa', 'Keputusan Kepala Desa', 'Surat Edaran']);

            // Format nomor yang lebih realistis
            $formatNomor = [
                'Peraturan Desa' => 'Nomor ' . $faker->numberBetween(1, 50) . ' Tahun ' . $faker->year,
                'Peraturan Kepala Desa' => $faker->numberBetween(1, 30) . '/' . $faker->randomElement(['PD', 'PKD', 'PERDES']) . '/' . $faker->year,
                'Keputusan Kepala Desa' => $faker->numberBetween(1, 100) . '/' . $faker->randomElement(['KEPDES', 'SK', 'KEP']) . '/' . $faker->year,
                'Surat Edaran' => $faker->numberBetween(1, 50) . '/SE/' . $faker->year
            ];

            $nomor = $formatNomor[$jenisDokumen] ?? '1/PERDES/' . $faker->year;

            // Buat judul yang lebih otentik
            $kataKunci = $faker->randomElement($judulPeraturan);
            $obyek = $faker->randomElement($obyekPeraturan);
            $lokasi = $faker->randomElement($wilayah);

            $judul = "$jenisDokumen $kataKunci $obyek di $lokasi " . $faker->city();

            Dokumen::create([
                'judul' => $judul,
                'nomor' => $nomor,
                'tahun' => $faker->year,
                'tanggal_penetapan' => $faker->date(),
                'jenis_dokumen_id' => $faker->randomElement($jenisDokumenIds),
                'kategori_dokumen_id' => $faker->randomElement($kategoriDokumenIds),
                'status' => $faker->randomElement(['Berlaku', 'Tidak Berlaku', 'Revisi', 'Baru']),
                'ringkasan' => $this->generateRingkasanIndonesia($faker),
            ]);
        }

        $this->command->info('Berhasil membuat 100 data Dokumen Hukum dengan istilah Indonesia.');
    }

    /**
     * Generate ringkasan dalam bahasa Indonesia
     */
    private function generateRingkasanIndonesia($faker): string
    {
        $ringkasanTemplate = [
            "Peraturan ini mengatur tentang tata cara %s guna mewujudkan %s di wilayah %s.",
            "Dokumen ini berisi ketentuan mengenai %s untuk meningkatkan %s masyarakat.",
            "Mengatur mekanisme %s dalam rangka %s sesuai dengan peraturan perundang-undangan.",
            "Menetapkan pedoman %s demi terciptanya %s yang baik dan berkelanjutan.",
            "Berisi aturan pelaksanaan %s untuk mendukung program %s pemerintah."
        ];

        $tataCara = [
            'pengelolaan dana desa', 'pemanfaatan aset desa', 'pelayanan administrasi',
            'pengawasan pembangunan', 'pemberian izin usaha', 'pengelolaan sampah',
            'pemeliharaan infrastruktur', 'penyelenggaraan kegiatan masyarakat'
        ];

        $tujuan = [
            'kesejahteraan masyarakat', 'ketertiban umum', 'pembangunan berkelanjutan',
            'pelayanan publik yang prima', 'transparansi pengelolaan keuangan',
            'partisipasi masyarakat', 'peningkatan ekonomi lokal', 'perlindungan lingkungan'
        ];

        $template = $faker->randomElement($ringkasanTemplate);
        return sprintf($template,
            $faker->randomElement($tataCara),
            $faker->randomElement($tujuan),
            $faker->city()
        );
    }
}
