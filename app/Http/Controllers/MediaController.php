<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'files' => 'required',
            'files.*' => 'mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240', // Max 10MB
            'ref_table' => 'required',
            'ref_id' => 'required'
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Buat nama unik: waktu_namaasli
                $filename = time() . '_' . $file->getClientOriginalName();

                // Simpan fisik file ke storage/app/public/media
                $path = $file->storeAs('media', $filename, 'public');

                // Simpan data ke database
                Media::create([
                    'ref_table' => $request->ref_table,
                    'ref_id' => $request->ref_id,
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $path,
                ]);
            }
            return back()->with('success', 'File berhasil diunggah.');
        }

        return back()->with('error', 'Gagal mengunggah file.');
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        // Hapus file fisik dari folder
        if (Storage::disk('public')->exists($media->file_path)) {
            Storage::disk('public')->delete($media->file_path);
        }

        // Hapus data dari database
        $media->delete();

        return back()->with('success', 'File berhasil dihapus.');
    }
}