<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dokumens', function (Blueprint $table) {
            // PERBAIKAN UTAMA:
            // Mengubah nama primary key dari 'id' (default) menjadi 'dokumen_id'
            // Ini agar sesuai dengan Model Dokumen.php dan View create.blade.php
            $table->id('dokumen_id');

            $table->string('nomor');
            $table->year('tahun');
            $table->string('judul', 500);
            $table->date('tanggal_penetapan');

            // Foreign Keys
            // Pastikan tabel 'jenis_dokumen' dan 'kategori_dokumen' sudah ada (migrate duluan)
            // Jika tabel 'jenis_dokumen' pk-nya 'jenis_id', Laravel mungkin bingung dengan constrained() biasa.
            // Gunakan format manual agar lebih aman:

            $table->unsignedBigInteger('jenis_dokumen_id');
            $table->unsignedBigInteger('kategori_dokumen_id');

            // Kolom tambahan sesuai diagram Anda (opsional)
            $table->string('status')->nullable();
            $table->text('ringkasan')->nullable();

            $table->timestamps();

            // Opsional: Definisikan relasi Foreign Key (Aktifkan jika tabel induk sudah siap dan kolom ID-nya sesuai)
            // $table->foreign('jenis_dokumen_id')->references('jenis_id')->on('jenis_dokumen')->onDelete('cascade');
            // $table->foreign('kategori_dokumen_id')->references('kategori_id')->on('kategori_dokumen')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};