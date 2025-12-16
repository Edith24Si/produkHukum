<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'nomor',
        'tahun',
        'tanggal_penetapan',
        'jenis_dokumen_id',
        'kategori_dokumen_id',
        'file_path', // <-- PASTIKAN KOLOM INI ADA DI DATABASE DENGAN NAMA PERSIS INI
        // Tambahkan semua kolom lain yang bisa diisi dari form atau seeder di sini.
    ];
    protected $table      = 'dokumens';
    protected $primaryKey = 'dokumen_id';
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

    public function lampirans()
    {
        return $this->hasMany(LampiranDokumen::class, 'dokumen_id', 'dokumen_id');
    }
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }
    public function scopeSearch($query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
                }
            });
        }
    }
}
