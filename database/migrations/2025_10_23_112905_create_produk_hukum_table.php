<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk_hukum', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nomor');
            $table->string('tahun');
            $table->text('tentang')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk_hukum');
    }
};
