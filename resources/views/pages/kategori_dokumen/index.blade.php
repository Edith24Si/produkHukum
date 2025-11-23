@extends('layouts.app')

@section('title', 'Data Kategori Dokumen')

@section('content')
    <div class="container mt-4">
        <h3>Daftar Kategori Dokumen</h3>
        <a href="{{ route('kategori_dokumen.create') }}" class="btn btn-success mb-3">+ Tambah Kategori</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <form method="GET" action="{{ route('kategori_dokumen.index') }}" onchange="this.form.submit()" class="mb-3">
                <div class="row">
                    <div class="col-md-2">
                        <select name="nama_kategori" class="form-select">
                            <option value="">All</option>
                            <option value="nama" {{ request('nama_kategori') == 'nama' ? 'selected' : '' }}>nama</option>
                            <option value="deskripsi" {{ request('nama_kategori') == 'deskripsi' ? 'selected' : '' }}>deskripsi</option>
                        </select>
                    </div>
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $kategori)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $kategori->nama }}</td>
                            <td>{{ $kategori->deskripsi }}</td>
                            <td>
                                <a href="{{ route('kategori_dokumen.edit', $kategori->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kategori_dokumen.destroy', $kategori->id) }}" method="POST"
                                    class="d-inline"> @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>
    @endsection
