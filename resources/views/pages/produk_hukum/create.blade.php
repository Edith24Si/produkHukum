@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Produk Hukum</h1>

    <form action="{{ route('produkHukum.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nomor</label>
            <input type="text" name="nomor" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tahun</label>
            <input type="text" name="tahun" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tentang</label>
            <textarea name="tentang" class="form-control" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label>File (PDF/DOCX)</label>
            <input type="file" name="file" class="form-control">
        </div>
        <button class="btn btn-success mt-2">Simpan</button>
    </form>
</div>
@endsection
