<?php
// app/Models/KategoriDokumen.php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Tambahkan ini

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

    // TAMBAHKAN RELASI INI
    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'kategori_dokumen_id', 'id');
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
