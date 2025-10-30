<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriDokumen;

class KategoriDokumenController extends Controller
{
    public function index()
    {
        $data = KategoriDokumen::latest()->get();
        return view('kategori_dokumen.index', compact('data'));
    }

    public function create()
    {
        return view('kategori_dokumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',   
            'deskripsi' => 'nullable',
        ]);

        KategoriDokumen::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori_dokumen.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = KategoriDokumen::findOrFail($id);
        return view('kategori_dokumen.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $kategori = KategoriDokumen::findOrFail($id);
        $kategori->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori_dokumen.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kategori = KategoriDokumen::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori_dokumen.index')->with('success', 'Kategori berhasil dihapus');
    }
}
