@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Edit User</h1>

        <div class="card shadow mb-4">
            <div class="card-body">

                {{-- Tampilkan Error Validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- PENTING: Tambahkan enctype="multipart/form-data" --}}
                <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- PENTING untuk method update --}}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                                    required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Username</label>
                                {{-- PERBAIKAN: Gunakan $user->username untuk menampilkan nilai saat ini --}}
                                <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label>Role / Hak Akses</label>
                                <select name="role" class="form-control" required>
                                    <option value="">-- Pilih Role --</option>
                                    {{-- PERBAIKAN: Gunakan $user->role untuk data yang sudah ada --}}
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- START: Tambah Form Foto Profil --}}
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <p><strong>Foto Profil</strong></p>

                            @if ($user->profile_picture)
                                <div class="mb-3">
                                    <label>Foto Saat Ini:</label><br>
                                    {{-- Tampilkan foto profil saat ini --}}
                                    [Gambar foto profil user saat ini]
                                    <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                         alt="Foto Profil"
                                         style="max-width: 150px; height: auto; border-radius: 5px;">
                                </div>
                            @endif

                            <p class="text-muted small">Kosongkan/Unggah baru. Maksimal ukuran file 2MB.</p>
                            <div class="form-group mb-3">
                                <label>Ganti/Upload Foto Baru</label>
                                <input type="file" name="profile_picture" class="form-control" accept="image/*">
                                @error('profile_picture')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- END: Tambah Form Foto Profil --}}

                    <hr>
                    <p><strong>Password</strong></p>
                    <p class="text-muted small">Kosongkan jika Anda tidak ingin mengubah password.</p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Password Baru</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>

    </div>
@endsection
