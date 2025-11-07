@extends('layouts.app')

@section('title', 'Edit Kategori Dokumen')

@section('content')
<div class="container mt-4">
    <h3>Edit Kategori Dokumen</h3>
    <form action="{{ route('kategori_dokumen.update', $kategori->id) }}" method="POST">
         @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama" value="{{ $kategori->nama }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $kategori->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kategori_dokumen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection