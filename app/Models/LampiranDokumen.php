<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LampiranDokumen extends Model
{
    use HasFactory;

    protected $table = 'lampiran_dokumen';
    protected $guarded = []; // Mengizinkan semua field untuk diisi

    /**
     * Relasi ke Dokumen (Many-to-One)
     */
    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'dokumen_id');
    }
}
