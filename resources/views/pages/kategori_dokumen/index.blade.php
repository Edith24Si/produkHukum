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
                            <option value="deskripsi" {{ request('nama_kategori') == 'deskripsi' ? 'selected' : '' }}>
                                deskripsi</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" id="exampleInputIconRight"
                                value="{{ request('search') }}" placeholder="Search" aria-label="Search">
                            <button type="submit" class="input-group-text" id="basic-addon2">
                                <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            @if (request('search'))
                                <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                    class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
                            @endif
                        </div>
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
