<?php
namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    // {
    //     foreach ($filterableColumns as $columns) {
    //         if ($request->filled($columns)) {
    //             $query->where($columns, $request->input($columns));
    //         }
    //     }
    //     return $query;
    // }
    // public function scopeSearch($query, $request, array $columns)
    // {
    //     if ($request->filled('search')) {
    //         $query->where(function ($q) use ($request, $columns) {
    //             foreach ($columns as $column) {
    //                 $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
    //             }
    //         });
    //     }
    // }

}
