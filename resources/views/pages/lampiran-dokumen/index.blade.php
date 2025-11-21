{{-- Pastikan ini di-extend dengan layout utama Anda --}}
@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Data Lampiran Dokumen</h1>

    <a href="{{ route('lampiranDokumen.create') }}" class="btn btn-primary bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow-md transition duration-150 mb-4">
        + Tambah Lampiran
    </a>

    @if(session('success'))
    <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table class="min-w-full bg-white border-collapse">
            <thead class="bg-gray-200 border-b border-gray-300">
                <tr>
                    <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">No</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Dokumen Induk</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Keterangan</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Nama File</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop menggunakan variabel $lampirans --}}
                @forelse ($lampirans as $item)
                <tr class="border-b border-gray-100 hover:bg-gray-50">
                    <td class="py-3 px-6 text-sm text-gray-700">{{ $loop->iteration }}</td>
                    {{-- Menampilkan Judul Dokumen Induk melalui relasi --}}
                    <td class="py-3 px-6 text-sm text-gray-700">{{ $item->dokumen->judul ?? 'Dokumen Induk Tidak Ditemukan' }}</td>
                    <td class="py-3 px-6 text-sm text-gray-700">{{ $item->keterangan ?? '-' }}</td>
                    {{-- Menampilkan nama file dari file_path --}}
                    <td class="py-3 px-6 text-sm text-gray-700">{{ basename($item->file_path) }}</td>
                    <td class="py-3 px-6 text-sm text-gray-700">
                        <div class="flex space-x-2">
                            {{-- Link untuk download file --}}
                            <a href="{{ Storage::url($item->file_path) }}" target="_blank" class="text-blue-500 hover:text-blue-700">
                                <i class="fas fa-download"></i> Download
                            </a>

                            {{-- Placeholder untuk form Hapus --}}
                            <form action="#" method="POST" onsubmit="return confirm('Yakin ingin menghapus lampiran ini?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 ml-2">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada data lampiran dokumen yang ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Tampilkan pagination --}}
    <div class="mt-4">
        {{ $lampirans->links() }}
    </div>
</div>
@endsection
