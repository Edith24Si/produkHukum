<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPerubahan;
use Illuminate\Http\Request;

class RiwayatPerubahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $dokumen_id = $request->input('dokumen_id');

        $riwayat = RiwayatPerubahan::with('dokumen')
            ->when($search, function($query, $search) {
                return $query->where('uraian_perubahan', 'like', "%{$search}%")
                            ->orWhere('versi', 'like', "%{$search}%");
            })
            ->when($dokumen_id, function($query, $dokumen_id) {
                return $query->where('dokumen_id', $dokumen_id);
            })
            ->orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('pages.riwayat-perubahan.index', compact('riwayat'));
    }

    /**
     * Display the specified resource.
     */
    public function show(RiwayatPerubahan $riwayatPerubahan)
    {
        $riwayatPerubahan->load('dokumen');
        return view('pages.riwayat-perubahan.show', compact('riwayatPerubahan'));
    }

    /**
     * Other methods are not needed for now since we only need index and show
     */
    public function create()
    {
        // Tidak diperlukan untuk riwayat perubahan (auto-generated)
        return abort(404);
    }

    public function store(Request $request)
    {
        // Tidak diperlukan untuk riwayat perubahan (auto-generated)
        return abort(404);
    }

    public function edit(string $id)
    {
        // Tidak diperlukan untuk riwayat perubahan (read-only)
        return abort(404);
    }

    public function update(Request $request, string $id)
    {
        // Tidak diperlukan untuk riwayat perubahan (read-only)
        return abort(404);
    }

    public function destroy(string $id)
    {
        // Tidak diperlukan untuk riwayat perubahan (read-only)
        return abort(404);
    }
}
