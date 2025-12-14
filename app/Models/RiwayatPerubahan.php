<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiwayatPerubahan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_perubahan';
    protected $primaryKey = 'riwayat_id';
    public $timestamps = true;

    protected $fillable = [
        'dokumen_id',
        'tanggal',
        'uraian_perubahan',
        'versi'
    ];

    protected $casts = [
        'tanggal' => 'date'
    ];

    /**
     * Get the dokumen that owns the riwayat perubahan.
     */
    public function dokumen(): BelongsTo
    {
        return $this->belongsTo(Dokumen::class, 'dokumen_id', 'dokumen_id');
    }

    /**
     * Scope untuk filter berdasarkan dokumen
     */
    public function scopeFilterByDokumen($query, $dokumen_id)
    {
        return $query->where('dokumen_id', $dokumen_id);
    }

    /**
     * Scope untuk filter berdasarkan tanggal
     */
    public function scopeFilterByDate($query, $start_date, $end_date = null)
    {
        if ($end_date) {
            return $query->whereBetween('tanggal', [$start_date, $end_date]);
        }
        return $query->whereDate('tanggal', $start_date);
    }
}
