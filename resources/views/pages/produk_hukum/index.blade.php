@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Produk Hukum</h1>

    <a href="{{ route('produkHukum.create') }}" class="btn btn-primary mb-3">
        + Tambah Produk Hukum
    </a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Nomor</th>
                    <th>Tahun</th>
                    {{-- KOREKSI 1: Mengubah judul kolom agar lebih jelas --}}
                    <th>Jenis / Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop menggunakan variabel $dokumens --}}
                @forelse ($dokumens as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- Menampilkan Judul secara singkat jika terlalu panjang --}}
                    <td>{{ \Illuminate\Support\Str::limit($item->judul, 50, '...') }}</td>
                    <td>{{ $item->nomor }}</td>
                    <td>{{ $item->tahun }}</td>
                    {{-- KOREKSI 2: Menampilkan Jenis dan Kategori Dokumen dalam satu sel --}}
                    <td>
                        {{-- Menggunakan nama_jenis dari model JenisDokumen --}}
                        <strong>Jenis:</strong> {{ $item->jenisDokumen->nama_jenis ?? 'N/A' }}<br>
                        {{-- Menggunakan nama dari model KategoriDokumen (sesuai perbaikan seeder) --}}
                        <strong>Kategori:</strong> {{ $item->kategoriDokumen->nama ?? 'N/A' }}
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="#" class="btn btn-sm btn-info me-2">Lihat</a>
                            <a href="{{ route('produkHukum.edit', $item->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>

                            <form action="{{ route('produkHukum.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dokumen ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data produk hukum yang ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $dokumens->links() }}
    </div>
</div>
@endsection
