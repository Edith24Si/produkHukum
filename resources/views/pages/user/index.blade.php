@extends('layouts.app')
{{-- (Asumsi nama layout utama Anda adalah app.blade.php) --}}

@section('title', 'Daftar User')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Daftar User</h1>

        <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
            + Tambah User
        </a>

        {{-- Notifikasi Sukses/Error --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

                </div>
            </form>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <div class="table-responsive">
                                <form method="GET" action="{{ route('user.index') }}">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <select name="Judul" class="form-select" onchange="this.form.submit()"
                                                class="mb-3">
                                                <option value="">All</option>
                                                <option value="Nama" {{ request('Email') == 'Nama' ? 'selected' : '' }}>
                                                    Nama
                                                </option>
                                                <option value="Username"
                                                    {{ request('Email') == 'Username' ? 'selected' : '' }}>
                                                    Username
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="text" name="search" class="form-control"
                                                    id="exampleInputIconRight" value="{{ request('search') }}"
                                                    placeholder="Search" aria-label="Search">
                                                <button type="submit" class="input-group-text" id="basic-addon2">
                                                    <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                                @if (request('search'))
                                                    <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                                        class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
                                                @endif
                                            </div>
                                        </div>
                                        @forelse($data as $index => $user)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>
                                                    <a href="{{ route('user.edit', $user->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>

                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Yakin hapus user ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Data user masih kosong.</td>
                                            </tr>
                                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
