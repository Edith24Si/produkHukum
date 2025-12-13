<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Cek apakah tabel sudah ada
        if (!Schema::hasTable('riwayat_perubahan')) {
            Schema::create('riwayat_perubahan', function (Blueprint $table) {
                $table->id('riwayat_id');

                // Gunakan unsignedBigInteger karena dokumen_id bukan id default
                $table->unsignedBigInteger('dokumen_id')->nullable(); // Sementara nullable

                $table->date('tanggal');
                $table->text('uraian_perubahan');
                $table->string('versi');
                $table->timestamps();

                // Foreign key constraint (tambahkan setelah tabel dibuat)
            });

            // Tambahkan foreign key constraint secara terpisah
            Schema::table('riwayat_perubahan', function (Blueprint $table) {
                $table->foreign('dokumen_id')
                      ->references('dokumen_id')
                      ->on('dokumens')
                      ->onDelete('cascade');
            });

            $this->command->info('Tabel riwayat_perubahan berhasil dibuat.');
        } else {
            $this->command->info('Tabel riwayat_perubahan sudah ada di database.');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_perubahan');
    }
};
