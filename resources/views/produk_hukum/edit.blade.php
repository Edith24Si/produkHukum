@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Produk Hukum</h1>

    <form action="{{ route('produkHukum.update', ['produk' => $produk->id]) }}" method="POST"> @csrf @method('PUT')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" value="{{ $produk->judul }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nomor</label>
            <input type="text" name="nomor" value="{{ $produk->nomor }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tahun</label>
            <input type="text" name="tahun" value="{{ $produk->tahun }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tentang</label>
            <textarea name="tentang" class="form-control" rows="3" required>{{ $produk->tentang }}</textarea>
        </div>
        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection