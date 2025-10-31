@extends('layouts.app')
{{-- (Asumsi nama layout utama Anda adalah app.blade.php) --}}

@section('title', 'Data Warga')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Data Warga</h1>

    <a href="{{ route('warga.create') }}" class="btn btn-primary mb-3">
        + Tambah Warga
    </a>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
    <div class="alert alert-success shadow-lg rounded-pill text-center">
    🎉 <strong>Berhasil!</strong>  SELAMAT DATANG Data warga baru telah ditambahkan dengan sukses.
</div>

    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No KTP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Pekerjaan</th>
                            <th>Telp</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->no_ktp }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td>{{ $item->telp }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a href="{{ route('warga.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('warga.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Data masih kosong.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
