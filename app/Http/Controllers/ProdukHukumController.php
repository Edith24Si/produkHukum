<?php

namespace App\Http\Controllers;

use App\Models\ProdukHukum;
use Illuminate\Http\Request;

class ProdukHukumController extends Controller
{
    public function index()
    {
        $data = ProdukHukum::latest()->get();
        return view('pages.produk_hukum.index', compact('data'));
    }

    public function create()
    {
        return view('pages.produk_hukum.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'nomor' => 'required',
        'tahun' => 'required',
        'tentang' => 'required',
        'file' => 'nullable|file|mimes:pdf,docx',
    ]);

    $file = null;
    if ($request->hasFile('file')) {
        $file = $request->file('file')->store('produk_hukum', 'public');
    }

    ProdukHukum::create([
        'judul' => $request->judul,
        'nomor' => $request->nomor,
        'tahun' => $request->tahun,
        'tentang' => $request->tentang,
        'file' => $file,
    ]);

    return redirect()->route('produkHukum.index')->with('success', 'Data berhasil ditambahkan');
}

public function update(Request $request, ProdukHukum $produk)
{
    $request->validate([
        'judul' => 'required',
        'nomor' => 'required',
        'tahun' => 'required',
        'tentang' => 'required',
    ]);

    $produk->update($request->only(['judul', 'nomor', 'tahun', 'tentang']));
    return redirect()->route('produkHukum.index')->with('success', 'Data berhasil diupdate');
}

public function edit(ProdukHukum $produk) {
    return view('pages.produk_hukum.edit', compact('produk'));
}

public function destroy(ProdukHukum $produk)
{
    $produk->delete();
    return redirect()->route('produkHukum.index')->with('success', 'Data berhasil dihapus');
}
}
