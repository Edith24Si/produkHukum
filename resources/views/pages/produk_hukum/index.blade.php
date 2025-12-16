@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Produk Hukum</h1>

        <a href="{{ route('produkHukum.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Produk Hukum
        </a>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {{-- PERBAIKAN STRUKTUR: Form pencarian diletakkan DI LUAR tabel --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form method="GET" action="{{ route('produkHukum.index') }}" class="form-inline float-right">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control bg-light border-0 small"
                            value="{{ request('search') }}" placeholder="Cari dokumen..." aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <h6 class="m-0 font-weight-bold text-primary pt-2">Daftar Dokumen</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                {{-- INI ADALAH HEADER YANG BENAR --}}
                                <th width="5%">No</th>
                                <th>Judul</th>
                                <th>Nomor</th>
                                <th>Tahun</th>
                                <th>Jenis / Kategori</th>
                                <th width="15%">Aksi</th> {{-- Lebar Aksi diperkecil sedikit --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dokumens as $dokumen)
                                <tr>
                                    {{-- 1. Kolom No (Menggunakan Nomor Urut Paginasi) --}}
                                    {{-- Menggunakan $loop->iteration jika tidak peduli urutan paginasi, atau Nomor Dokumen. --}}
                                    {{-- Berdasarkan konten yang Anda berikan, kolom pertama terisi nomor dokumen. Kita sesuaikan. --}}

                                    {{-- Kolom 1: No (Menggunakan nomor urut dari paginasi jika ada, atau baris) --}}
                                    <td>{{ ($dokumens->currentPage() - 1) * $dokumens->perPage() + $loop->iteration }}</td>

                                    {{-- Kolom 2: Judul --}}
                                    <td>{{ $dokumen->judul }}</td>

                                    {{-- Kolom 3: Nomor --}}
                                    <td>{{ $dokumen->nomor }}</td>

                                    {{-- Kolom 4: Tahun --}}
                                    <td>{{ $dokumen->tahun }}</td>

                                    {{-- Kolom 5: Jenis / Kategori (SESUAI HEADER) --}}
                                    <td>
                                        {{ $dokumen->jenisDokumen->nama_jenis ?? '-' }}
                                        <br>
                                        <small class="text-muted">({{ $dokumen->kategoriDokumen->nama ?? '-' }})</small>
                                    </td>

                                    {{-- Kolom 6: Aksi (SESUAI HEADER TERAKHIR) --}}
                                    <td class="text-center">
                                        {{-- KODE AKSI ANDA DIMASUKKAN DI SINI --}}
                                        @if ($dokumen->dokumen_id)
                                            {{-- Tombol Show --}}
                                            <a href="{{ route('produkHukum.show', $dokumen->dokumen_id) }}" class="btn btn-sm btn-info"
                                                title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            {{-- Tombol Edit --}}
                                            <a href="{{ route('produkHukum.edit', $dokumen->dokumen_id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {{-- Tombol Hapus --}}
                                            <form action="{{ route('produkHukum.destroy', $dokumen->dokumen_id) }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus dokumen ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
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

                <div class="mt-3">
                    {{ $dokumens->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
