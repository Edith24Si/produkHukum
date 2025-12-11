<?php
namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\JenisDokumen;
use App\Models\KategoriDokumen;
use Illuminate\Http\Request;
use App\Models\Media;

class ProdukHukumController extends Controller
{
    /**
     * Menampilkan daftar semua Dokumen (Produk Hukum).
     */
    public function index(Request $request)
    {
        $filterableColumns = ['judul', 'nomor', 'tahun'];
        $searchableColumns = ['nomor', 'judul'];

        $dokumens = Dokumen::with(['jenisDokumen', 'kategoriDokumen'])
            ->filter($request, $filterableColumns)
            ->search($request, $searchableColumns)
            ->orderBy('tahun', 'desc')
            ->paginate(30)
            ->withQueryString();

        return view('pages.produk_hukum.index', compact('dokumens'));
    }

    /**
     * Menampilkan form untuk membuat Dokumen (Produk Hukum) baru.
     */
    public function create()
    {
        // Ambil data Jenis dan Kategori untuk dropdown
        $jenisDokumens    = JenisDokumen::all();
        $kategoriDokumens = KategoriDokumen::all();

        // Kirim data ke view 'pages.produk_hukum.create'
        return view('pages.produk_hukum.create', compact('jenisDokumens', 'kategoriDokumens'));
    }

    /**
     * Menyimpan Dokumen baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'judul'               => 'required|string|max:255',
            'nomor'               => 'required|integer|min:1',
            'tahun'               => 'required|integer|min:1900|max:' . date('Y'),
            'tanggal_penetapan'   => 'required|date',
            'jenis_dokumen_id'    => 'required|exists:jenis_dokumen,id',
            'kategori_dokumen_id' => 'required|exists:kategori_dokumen,id',
            'file_dokumen'        => 'nullable|file|max:5120|mimes:pdf,doc,docx,xls,xlsx,zip,rar',
        ]);

        // 2. Proses Unggah File (Jika ada)
        if ($request->hasFile('file_dokumen')) {
            $file     = $request->file('file_dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Simpan file ke direktori 'public/dokumen_hukum'
            $path                       = $file->storeAs('dokumen_hukum', $filename, 'public');
            $validatedData['file_path'] = $path;
        }

        // 3. Simpan Data ke Database
        Dokumen::create($validatedData);

        // 4. Redirect dengan Pesan Sukses
        return redirect()->route('produkHukum.index')
            ->with('success', 'Produk Hukum berhasil ditambahkan!');
    }
    public function show($id)
    {
        // 1. Ambil detail dokumen
        $dokumen = Dokumen::with(['jenisDokumen', 'kategoriDokumen'])->findOrFail($id);

        // 2. Ambil file media milik dokumen ini
        // Note: 'dokumens' adalah nama tabel Anda di database
        $medias = Media::where('ref_table', 'dokumens')
            ->where('ref_id', $id)
            ->latest()
            ->get();

        return view('pages.produk_hukum.show', compact('dokumen', 'medias'));
    }
    /**
     * Menampilkan form edit.
     */
    public function edit($id)
    {
        // Menggunakan findOrFail dengan ID yang sesuai (dokumen_id)
        $dokumen = Dokumen::findOrFail($id);

        $jenisDokumens = JenisDokumen::all();
        $kategoriDokumens = KategoriDokumen::all();

        return view('pages.produk_hukum.edit', compact('dokumen', 'jenisDokumens', 'kategoriDokumens'));
    }

    /**
     * Menyimpan perubahan (Update).
     */
    public function update(Request $request, $id)
    {
        $dokumen = Dokumen::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'nomor' => 'required|string', // Ubah jadi string jaga-jaga ada huruf
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'tanggal_penetapan' => 'required|date',
            'jenis_dokumen_id' => 'required|exists:jenis_dokumen,id',
            'kategori_dokumen_id' => 'required|exists:kategori_dokumen,id',
            'file_dokumen' => 'nullable|file|max:5120|mimes:pdf,doc,docx,xls,xlsx,zip,rar',
        ]);

        // Cek jika ada file baru diupload untuk mengganti file utama
        if ($request->hasFile('file_dokumen')) {
            // Hapus file lama jika ada (Opsional, perlu import Storage)
            // if ($dokumen->file_path && \Illuminate\Support\Facades\Storage::exists('public/' . $dokumen->file_path)) {
            //    \Illuminate\Support\Facades\Storage::delete('public/' . $dokumen->file_path);
            // }

            $file = $request->file('file_dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('dokumen_hukum', $filename, 'public');

            $validatedData['file_path'] = $path;
        }

        $dokumen->update($validatedData);

        return redirect()->route('produkHukum.index')
            ->with('success', 'Produk Hukum berhasil diperbarui!');
    }

    /**
     * Menghapus data.
     */
    public function destroy($id)
    {
        $dokumen = Dokumen::findOrFail($id);

        // Hapus data (File fisik bisa dihapus juga jika perlu)
        $dokumen->delete();

        return redirect()->route('produkHukum.index')
            ->with('success', 'Produk Hukum berhasil dihapus!');
    }
}
