<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->string('nomor'); // Digunakan di seeder
            $table->year('tahun'); // Digunakan di seeder
            $table->string('judul', 500); // Digunakan di seeder
            $table->date('tanggal_penetapan'); // Digunakan di seeder

            // Kolom Foreign Key (harus sesuai dengan tabel lain yang sudah Anda isi)
            $table->foreignId('jenis_dokumen_id')->constrained('jenis_dokumen'); // Tabel harus bernama 'jenis_dokumen'
            $table->foreignId('kategori_dokumen_id')->constrained('kategori_dokumen'); // Tabel harus bernama 'kategori_dokumen'

            // Tambahkan kolom lain yang mungkin dibutuhkan, seperti file_path
            // $table->string('file_path')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
