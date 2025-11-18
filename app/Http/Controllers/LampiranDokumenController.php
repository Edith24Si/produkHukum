<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LampiranDokumen;
use App\Models\Dokumen; // Pastikan model Dokumen diimport
use Illuminate\Support\Facades\Storage; // Digunakan untuk menyimpan file

class LampiranDokumenController extends Controller
{
    /**
     * Menampilkan daftar semua Lampiran Dokumen.
     */
    public function index()
    {
        // Ambil semua lampiran dengan eager loading Dokumen
        $lampirans = LampiranDokumen::with('dokumen')->paginate(20);

        // Memuat view index.blade.php
        return view('pages.lampiran_dokumen.index', compact('lampirans'));
    }

    /**
     * Menampilkan form untuk membuat Lampiran Dokumen baru.
     */
    public function create()
    {
        // Ambil semua Dokumen (Produk Hukum) untuk mengisi dropdown "Dokumen Induk"
        // Asumsi nama model Dokumen adalah 'Dokumen'
        $dokumens = Dokumen::orderBy('judul')->get();

        // Memuat view create.blade.php dan mengirimkan data dokumen
        return view('pages.lampiran_dokumen.create', compact('dokumens'));
    }

    /**
     * Menyimpan Lampiran Dokumen baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            // Pastikan dokumen_id adalah ID yang ada di tabel 'dokumen'
            'dokumen_id' => 'required|exists:dokumen,id',
            'keterangan' => 'nullable|string|max:255',
            // Wajib ada file, max 5MB, dengan ekstensi yang diizinkan
            'file_lampiran' => 'required|file|max:5120|mimes:pdf,doc,docx,xls,xlsx,zip,rar',
        ]);

        // 2. Proses Unggah File
        if ($request->hasFile('file_lampiran')) {
            $file = $request->file('file_lampiran');

            // Membuat nama file yang unik
            $filename = time() . '_' . $file->getClientOriginalName();

            // Simpan file ke storage (misalnya 'storage/app/public/lampiran_dokumen')
            $path = $file->storeAs('lampiran_dokumen', $filename, 'public');

            // 3. Simpan Data ke Database
            LampiranDokumen::create([
                'dokumen_id' => $validatedData['dokumen_id'],
                'keterangan' => $validatedData['keterangan'],
                'file_path' => $path, // Menyimpan path file
            ]);

            // 4. Redirect dengan Pesan Sukses
            return redirect()->route('lampiranDokumen.index')
                             ->with('success', 'Lampiran Dokumen berhasil ditambahkan!');
        }

        // Jika file gagal diupload (seharusnya tidak terjadi jika validasi sukses)
        return redirect()->back()->withErrors(['file_lampiran' => 'Gagal mengunggah file.'])->withInput();
    }

    // ... Anda dapat menambahkan method show, edit, update, dan destroy lainnya
}
