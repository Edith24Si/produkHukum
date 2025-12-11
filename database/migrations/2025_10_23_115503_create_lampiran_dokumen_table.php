<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lampiran_dokumen', function (Blueprint $table) {
            // Gunakan 'lampiran_id' sebagai PK sesuai skema gambar, atau 'id' default Laravel
            // Jika mengikuti gambar: $table->id('lampiran_id');
            $table->id();

            // Kolom Foreign Key ke tabel dokumen
            // Pastikan tipe datanya sama dengan PK di tabel dokumen (biasanya unsignedBigInteger)
            $table->unsignedBigInteger('dokumen_id');

            $table->string('file_path');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Opsional: Definisikan Foreign Key Constraint (jika tabel dokumen sudah ada)
            // Pastikan 'dokumen_id' di tabel referensi benar
            // $table->foreign('dokumen_id')->references('dokumen_id')->on('dokumen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lampiran_dokumen');
    }
};