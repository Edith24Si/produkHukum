<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $guarded = []; // Agar dapat diisi oleh Seeder
    protected $table = 'dokumens';

    // Relasi untuk mengambil nama Jenis Dokumen
    public function jenisDokumen()
    {
        return $this->belongsTo(JenisDokumen::class, 'jenis_dokumen_id');
    }

    // Relasi untuk mengambil nama Kategori Dokumen
    public function kategoriDokumen()
    {
        return $this->belongsTo(KategoriDokumen::class, 'kategori_dokumen_id');
    }
}
