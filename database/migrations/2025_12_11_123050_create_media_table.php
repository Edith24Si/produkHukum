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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('ref_table'); // Nama tabel pemilik (contoh: 'dokumens')
            $table->unsignedBigInteger('ref_id'); // ID dari data pemilik
            $table->string('file_name'); // Nama asli file untuk ditampilkan
            $table->string('file_path'); // Lokasi file di folder storage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
