<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LampiranDokumen;
use App\Models\Dokumen;
use Illuminate\Support\Facades\Storage; // Pastikan ini ada

class LampiranDokumenController extends Controller
{
    // --- MENAMPILKAN DATA (INDEX) ---
    public function index()
    {
        $lampirans = LampiranDokumen::with('dokumen')->paginate(20);
        return view('pages.lampiran-dokumen.index', compact('lampirans'));
    }

    // --- FORM TAMBAH (CREATE) ---
    public function create()
    {
        $dokumens = Dokumen::orderBy('judul')->get();
        return view('pages.lampiran-dokumen.create', compact('dokumens'));
    }

    // --- PROSES SIMPAN (STORE) ---
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dokumen_id' => 'required|exists:dokumens,dokumen_id',
            'keterangan' => 'nullable|string|max:255',
            'file_lampiran' => 'required|file|max:5120|mimes:pdf,doc,docx,xls,xlsx,zip,rar',
        ]);

        if ($request->hasFile('file_lampiran')) {
            $file = $request->file('file_lampiran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('lampiran_dokumen', $filename, 'public');

            LampiranDokumen::create([
                'dokumen_id' => $validatedData['dokumen_id'],
                'keterangan' => $validatedData['keterangan'],
                'file_path' => $path,
            ]);

            return redirect()->route('lampiranDokumen.index')
                ->with('success', 'Lampiran Dokumen berhasil ditambahkan!');
        }

        return redirect()->back()->withErrors(['file_lampiran' => 'Gagal mengunggah file.'])->withInput();
    }

    // --- FORM EDIT (YANG SEBELUMNYA ERROR) ---
    public function edit($id)
    {
        $lampiran = LampiranDokumen::findOrFail($id);
        $dokumens = Dokumen::orderBy('judul')->get();

        return view('pages.lampiran-dokumen.edit', compact('lampiran', 'dokumens'));
    }

    // --- PROSES UPDATE ---
    public function update(Request $request, $id)
    {
        $lampiran = LampiranDokumen::findOrFail($id);

        $validatedData = $request->validate([
            'dokumen_id' => 'required|exists:dokumens,dokumen_id',
            'keterangan' => 'nullable|string|max:255',
            'file_lampiran' => 'nullable|file|max:5120|mimes:pdf,doc,docx,xls,xlsx,zip,rar', // Boleh kosong saat update
        ]);

        // Update data text
        $lampiran->dokumen_id = $validatedData['dokumen_id'];
        $lampiran->keterangan = $validatedData['keterangan'];

        // Cek jika ada file baru diupload
        if ($request->hasFile('file_lampiran')) {
            // Hapus file lama jika ada
            if ($lampiran->file_path && Storage::disk('public')->exists($lampiran->file_path)) {
                Storage::disk('public')->delete($lampiran->file_path);
            }

            // Upload file baru
            $file = $request->file('file_lampiran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('lampiran_dokumen', $filename, 'public');

            $lampiran->file_path = $path;
        }

        $lampiran->save();

        return redirect()->route('lampiranDokumen.index')
            ->with('success', 'Lampiran berhasil diperbarui!');
    }

    // --- PROSES HAPUS (DESTROY) ---
    public function destroy($id)
    {
        $lampiran = LampiranDokumen::findOrFail($id);

        // Hapus file fisik dari storage
        if ($lampiran->file_path && Storage::disk('public')->exists($lampiran->file_path)) {
            Storage::disk('public')->delete($lampiran->file_path);
        }

        $lampiran->delete();

        return redirect()->route('lampiranDokumen.index')
            ->with('success', 'Lampiran berhasil dihapus!');
    }
}