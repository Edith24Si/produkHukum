<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisDokumen;

class JenisDokumenController extends Controller
{
    public function index()
    {
        $data = JenisDokumen::paginate(10);
        return view('jenis_dokumen.index', compact('data'));
    }

    public function create()
    {
        // Ini sudah benar menggunakan view()
        return view('pages.jenis_dokumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|unique:jenis_dokumen,nama_jenis',
            'deskripsi' => 'nullable|string'
        ]);

        JenisDokumen::create($request->all());

        return redirect()->route('jenis_dokumen.index')->with('success', 'Jenis dokumen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenis = JenisDokumen::findOrFail($id);
        // Ini sudah benar menggunakan view()
        return view('pages.jenis_dokumen.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $jenis = JenisDokumen::findOrFail($id);

        $request->validate([
            'nama_jenis' => 'required|unique:jenis_dokumen,nama_jenis,' . $id . ',jenis_id',
            'deskripsi' => 'nullable|string'
        ]);

/*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Menghapus jenis dokumen berdasarkan id
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
/*******  f6636020-6af6-4692-8432-bce3fd0df56b  *******/        $jenis->update($request->all());

        // --- INI YANG DIPERBAIKI ---
        return redirect()->route('jenis_dokumen.index')->with('success', 'Jenis dokumen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        JenisDokumen::destroy($id);

        return redirect()->route('jenis_dokumen.index')->with('success', 'Jenis dokumen berhasil dihapus.');
    }
}
