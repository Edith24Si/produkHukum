@extends('layouts.app')

@section('title', 'Tambah User Baru')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Tambah User Baru</h1>

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

            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                        </div>
                    </div>
                </div>

                <hr>
                <p><strong>Password</strong></p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</div>
@endsection