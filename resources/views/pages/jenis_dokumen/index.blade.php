@extends('layouts.app')

@section('title', 'Data Jenis Dokumen')

@section('content')
    <div class="container mt-4">
        <h3>Daftar Jenis Dokumen</h3>
        <a href="{{ route('jenis_dokumen.create') }}" class="btn btn-success mb-3">+ Tambah Jenis</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
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
                            <a href="{{ route('jenis_dokumen.edit', $jenis->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('jenis_dokumen.destroy', $jenis->id) }}" method="POST" class="d-inline">
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
         <div class="mt-3">
        {{ $data->links('pagination::bootstrap-5') }}
    </div>
@endsection
