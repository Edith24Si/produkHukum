<?php

namespace App\Http\Controllers;

use App\Models\Warga; // <-- Jangan lupa import
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $data = Warga::latest()->get();
        return view('warga.index', compact('data'));
    }

    public function create()
    {
        return view('warga.create');
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'no_ktp' => 'required|unique:wargas,no_ktp',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'telp' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        Warga::create($request->all());

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function edit(Warga $warga) // Laravel otomatis mencari Warga by ID
    {
        return view('warga.edit', compact('warga'));
    }

    public function update(Request $request, Warga $warga)
    {
        $request->validate([
            // Pastikan KTP unik, kecuali untuk dirinya sendiri
            'no_ktp' => 'required|unique:wargas,no_ktp,' . $warga->id,
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'telp' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        $warga->update($request->all());

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil diperbarui.');
    }

    public function destroy(Warga $warga)
    {
        $warga->delete();
        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil dihapus.');
    }
}
