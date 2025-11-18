<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\JenisDokumen;
use App\Models\KategoriDokumen;
use Illuminate\Support\Facades\Storage; // Tambahkan untuk menangani file

class DokumenController extends Controller
{
    /**
     * Menampilkan daftar semua Dokumen.
     */
    public function index()
    {
        // Ambil data Dokumen dengan eager loading untuk Jenis dan Kategori,
        // diurutkan berdasarkan tahun terbaru, dan dipaginasi 15 data per halaman.
        $dokumens = Dokumen::with(['jenisDokumen', 'kategoriDokumen'])
                            ->orderBy('tahun', 'desc')
                            ->paginate(15);

        // Kirim data ke view 'pages.produk_hukum.index'
        return view('pages.produk_hukum.index', compact('dokumens'));
    }

    /**
     * Menampilkan form untuk membuat Dokumen baru.
     */
    public function create()
    {
        // Ambil data Jenis dan Kategori untuk dropdown
        $jenisDokumens = JenisDokumen::all();
        $kategoriDokumens = KategoriDokumen::all();

        // Kirim data ke view 'pages.produk_hukum.create'
        // FIX: Pastikan kedua variabel ini dikirimkan ke view
        return view('pages.produk_hukum.create', compact('jenisDokumens', 'kategoriDokumens'));
    }

    /**
     * Menyimpan dokumen baru ke database dan mengunggah file.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'nomor' => 'required|numeric',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'tanggal_penetapan' => 'required|date',
            'jenis_dokumen_id' => 'required|exists:jenis_dokumen,id',
            'kategori_dokumen_id' => 'required|exists:kategori_dokumen,id',
            // Validasi file: opsional, harus file, maksimal 5MB, format PDF, DOCX, DOC
            'file_dokumen' => 'nullable|file|max:5120|mimes:pdf,docx,doc',
        ]);

        // 2. Unggah File (Jika ada)
        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Simpan file ke direktori 'public/dokumen_hukum'
            $path = $file->storeAs('dokumen_hukum', $filename, 'public');

            // Simpan path ke validatedData
            $validatedData['file_path'] = $path;

            // Catatan: Anda harus memastikan kolom 'file_path' ada di tabel 'dokumens'
        }

        // 3. Simpan Data ke Database
        Dokumen::create($validatedData);

        // 4. Redirect dengan Pesan Sukses
        return redirect()->route('produkHukum.index')
                         ->with('success', 'Produk hukum berhasil ditambahkan.');
    }
}
