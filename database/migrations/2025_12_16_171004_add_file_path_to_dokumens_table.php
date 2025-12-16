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
        Schema::table('dokumens', function (Blueprint $table) {
            // Tambahkan kolom 'file_path' untuk menyimpan jalur file yang diupload.
            // Kolom ini nullable karena file utama bersifat opsional (sesuai create.blade.php).
            $table->string('file_path')->nullable()->after('tanggal_penetapan');
        });
    }

    public function down(): void
    {
        Schema::table('dokumens', function (Blueprint $table) {
            // Hapus kolom jika rollback
            $table->dropColumn('file_path');
        });
    }
};
