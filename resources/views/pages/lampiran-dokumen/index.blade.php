@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Data Lampiran Dokumen</h1>

        <a href="{{ route('lampiranDokumen.create') }}" class="btn btn-primary mb-4">
            <i class="fas fa-plus"></i> Tambah Lampiran
        </a>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Lampiran</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th width="5%">No</th>
                                <th>Dokumen Induk</th>
                                <th>Keterangan</th>
                                <th>Nama File</th>
                                <th width="25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lampirans as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->dokumen->judul ?? 'Dokumen Induk Tidak Ditemukan' }}</td>
                                    <td>{{ $item->keterangan ?? '-' }}</td>
                                    <td>{{ basename($item->file_path) }}</td>
                                    <td>
                                        <a href="{{ Storage::url($item->file_path) }}" target="_blank"
                                            class="btn btn-info btn-sm" title="Download">
                                            <i class="fas fa-download"></i>
                                        </a>

                                        <a href="{{ route('lampiranDokumen.edit', $item->id) }}" class="btn btn-warning btn-sm"
                                            title="Edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <form action="{{ route('lampiranDokumen.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus lampiran ini?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data lampiran dokumen yang ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $lampirans->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection