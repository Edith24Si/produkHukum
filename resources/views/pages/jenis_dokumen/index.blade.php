@extends('layouts.app')

@section('title', 'Data Jenis Dokumen')

@section('content')
    <div class="container mt-4">
        <h3>Daftar Jenis Dokumen</h3>
        <a href="{{ route('jenis_dokumen.create') }}" class="btn btn-success mb-3">+ Tambah Jenis</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <form method="GET" action="{{ route('jenis_dokumen.index') }}" onchange="this.form.submit()" class="mb-3">
                <div class="row">
                    <div class="col-md-2">
                        <select name="JenisDokumen" class="form-select">
                            <option value="">All</option>
                            <option value="Deskripsi" {{ request('JenisDokumen') == 'Deskripsi' ? 'selected' : '' }}>
                                Deskripsi</option>
                            <option value="NamaJenis" {{ request('JenisDokumen') == 'NamaJenis' ? 'selected' : '' }}>
                                NamaJenis</option>
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
                        </div>
                    </div>
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jenis</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $jenis)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $jenis->nama_jenis }}</td>
                            <td>{{ $jenis->deskripsi }}</td>
                            <td>
                                <a href="{{ route('jenis_dokumen.edit', $jenis->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('jenis_dokumen.destroy', $jenis->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>
    @endsection
