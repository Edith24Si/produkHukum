<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisDokumen;

class JenisDokumenController extends Controller
{
    public function index(Request $request)
    {
         $filterableColumns = ['jenisDokumen'];
         $searchableColumns = ['nama_jenis','deskripsi'];

        $data = JenisDokumen::filter($request, $filterableColumns)
        ->search($request,$searchableColumns)
        ->paginate(10)
        ->withQueryString();

        return view('pages.jenis_dokumen.index', compact('data'));
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
            // HAPUS bagian ',jenis_id' di belakang.
            // Laravel secara default akan mencari kolom 'id' jika parameter ke-4 tidak diisi.
            'nama_jenis' => 'required|unique:jenis_dokumen,nama_jenis,' . $id,

            // Atau jika ingin lebih eksplisit menyebutkan 'id':
            // 'nama_jenis' => 'required|unique:jenis_dokumen,nama_jenis,' . $id . ',id',

            'deskripsi' => 'nullable|string'
        ]);

        $jenis->update($request->all());

        return redirect()->route('jenis_dokumen.index')->with('success', 'Jenis dokumen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        JenisDokumen::destroy($id);

        return redirect()->route('jenis_dokumen.index')->with('success', 'Jenis dokumen berhasil dihapus.');
    }
}
