@extends('layouts.app')

@section('title', 'Tambah Jenis Dokumen')

@section('content')
<div class="container mt-4">
    <h3>Tambah Jenis Dokumen</h3>
    <form action="{{ route('jenis_dokumen.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Nama Jenis Dokumen</label>
            <input type="text" name="nama_jenis" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('jenis_dokumen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
