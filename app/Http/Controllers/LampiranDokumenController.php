<?php

namespace App\Http\Controllers;

use App\Models\LampiranDokumen;
use App\Models\Dokumen;
use Illuminate\Http\Request;

class LampiranDokumenController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'dokumen_id' => 'required',
        'keterangan' => 'nullable|string'
    ]);

    LampiranDokumen::create($request->all());

    return redirect()->route('lampiran-dokumen.index')->with('success', 'Lampiran berhasil ditambahkan!');
}

   public function index()
{
    $lampiran = LampiranDokumen::with('dokumen')->get();
    return view('pages.lampiran-dokumen.index', compact('lampiran'));
}

public function create()
{
    $dokumen = Dokumen::all();
    return view('pages.lampiran-dokumen.create', compact('dokumen'));
}

public function edit($id)
{
    $lampiran = LampiranDokumen::findOrFail($id);
    $dokumen = Dokumen::all();
    return view('pages.lampiran-dokumen.edit', compact('lampiran', 'dokumen'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'dokumen_id' => 'required',
            'keterangan' => 'nullable|string'
        ]);

        $lampiran = LampiranDokumen::findOrFail($id);
        $lampiran->update($request->all());

        return redirect()->route('lampiran-dokumen.index')->with('success', 'Lampiran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        LampiranDokumen::destroy($id);

        return redirect()->route('lampiran-dokumen.index')->with('success', 'Lampiran berhasil dihapus!');
    }
}
