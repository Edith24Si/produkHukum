@extends('layouts.app')

@section('title', 'Edit Jenis Dokumen')

@section('content')
<div class="container mt-4">
    <h3>Edit Jenis Dokumen</h3>

    <form action="{{ route('jenis_dokumen.update', $jenis->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nama Jenis Dokumen</label>
            <input type="text" name="nama_jenis" class="form-control" value="{{ $jenis->nama_jenis }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $jenis->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('jenis_dokumen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
