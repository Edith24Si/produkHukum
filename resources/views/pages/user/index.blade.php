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

        {{-- START: Form Pencarian & Filter (Dibersihkan) --}}
        <div class="row mb-3">
            <div class="col-md-12">
                <form method="GET" action="{{ route('user.index') }}">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <select name="judul" class="form-select" onchange="this.form.submit()">
                                <option value="">Filter Kolom</option>
                                <option value="name" {{ request('judul') == 'name' ? 'selected' : '' }}>Nama</option>
                                <option value="username" {{ request('judul') == 'username' ? 'selected' : '' }}>Username
                                </option>
                                <option value="email" {{ request('judul') == 'email' ? 'selected' : '' }}>Email</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                                    placeholder="Cari..." aria-label="Search">
                                <button type="submit" class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- END: Form Pencarian & Filter --}}


        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>FOTO</th> {{-- Tambah Kolom FOTO --}}
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Role</th> {{-- Tambah Kolom ROLE --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($data as $index => $user)
                                <tr>
                                    <td>
                                        {{-- Logika Tampilkan Foto atau Placeholder Inisial --}}
                                        @if ($user->profile_picture)

                                            {{-- [foto profil user] --}}
                                            
                                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Foto Profil"
                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                        @else
                                            {{-- Placeholder Inisial (Compressed Image) --}}
                                            [placeholder default/inisial]
                                            <div
                                                style="width: 50px; height: 50px; background-color: #007bff; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 18px;">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                        @endif
                                    </td>
                                    {{-- Penomoran yang benar untuk pagination --}}
                                    <td>{{ $index + 1 + ($data->currentPage() - 1) * $data->perPage() }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        {{-- Tampilkan Role dengan debugging --}}
                                        @php
                                            // Debug: Lihat apa yang ada di $user->role
                                            // {{-- dd($user->role) --}}
                                        @endphp

                                        @if (isset($user->role))
                                            @if ($user->role == 'admin' || $user->role == 'Admin')
                                                <span class="badge bg-primary">Admin</span>
                                            @elseif($user->role == 'user' || $user->role == 'User')
                                                <span class="badge bg-secondary">User</span>
                                            @else
                                                <span
                                                    class="badge bg-warning text-dark">{{ $user->role ?? 'Tidak Ada' }}</span>
                                            @endif
                                        @else
                                            <span class="badge bg-danger">No Role</span>
                                        @endif
                                    </td>
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
                                    {{-- Total kolom: FOTO, No, Nama, Email, Username, Role, Aksi = 7 kolom --}}
                                    <td colspan="7" class="text-center">Data user masih kosong.</td>
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
        [Gambar contoh daftar user dengan foto profil]
    </div>
@endsection
