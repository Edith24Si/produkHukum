@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Produk Hukum</h1>

    <a href="{{ route('produkHukum.create') }}" class="btn btn-primary">
        + Tambah Produk Hukum
    </a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="bg-primary text-white">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Nomor</th>
                <th>Tahun</th>
                <th>Tentang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->nomor }}</td>
                <td>{{ $item->tahun }}</td>
                <td>{{ $item->tentang }}</td>
                <td>
                    <a href="{{ route('produkHukum.edit', ['produk' => $item->id]) }}">Edit</a>
                    <form action="{{ route('produkHukum.destroy', ['produk' => $item->id]) }}" method="POST">
                         @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection