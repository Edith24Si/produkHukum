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
        @if (session('success'))
            <div class="alert alert-success shadow-lg rounded-pill text-center">
                🎉 <strong>Berhasil!</strong> SELAMAT DATANG Data warga baru telah ditambahkan dengan sukses.
            </div>
        @endif
          <div class="table-responsive">
            <form method="GET" action="{{ route('warga.index') }}" onchange="this.form.submit()" class="mb-3">
                <div class="row">
                    <div class="col-md-2">
                        <select name="warga" class="form-select">
                            <option value="">All</option>
                            <option value="nama" {{ request('nama_warga') == 'nama' ? 'selected' : '' }}>nama</option>
                            <option value="email" {{ request('nama_warga') == 'email' ? 'selected' : '' }}>email</option>
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
                            </div>
                            </button>
                            @if (request('search'))
                                <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                    class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
                            @endif
                        </div>

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
                                                        <a href="{{ route('warga.edit', $item->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>

                                                        <form action="{{ route('warga.destroy', $item->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
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
                                <div class="d-flex justify-content-center">
                                    {{ $data->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>

                    </div>
                @endsection
