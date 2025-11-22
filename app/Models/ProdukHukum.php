<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdukHukum extends Model
{
    use HasFactory;

    protected $table = 'produk_hukum';

    protected $fillable = [
        'judul',
        'nomor',
        'tahun',
        'tentang',
        'file',
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
