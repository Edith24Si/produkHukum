<?php
// app/Models/KategoriDokumen.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan ini
use Illuminate\Database\Eloquent\Model;

class KategoriDokumen extends Model
{
    use HasFactory; // Tambahkan ini
    protected $table = 'kategori_dokumen';
    /**
     * Kolom yang boleh diisi.
     */
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    // Atau, jika Anda ingin semua kolom boleh diisi (kecuali 'id')
    // protected $guarded = [];
}
