<?php
// app/Models/RiwayatPerubahan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiwayatPerubahan extends Model
{
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

    public function dokumen(): BelongsTo
    {
        return $this->belongsTo(Dokumen::class, 'dokumen_id', 'dokumen_id');
    }
}
