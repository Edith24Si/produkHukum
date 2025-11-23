<?php
// app/Models/KategoriDokumen.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan ini

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

    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }
}
