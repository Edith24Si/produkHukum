@extends('layouts.app')
{{-- (Asumsi nama layout utama Anda adalah app.blade.php) --}}

@section('title', 'Tambah Data Warga')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Tambah Data Warga</h1>

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

            <form action="{{ route('warga.store') }}" method="POST">
                @csrf
                <div class="row">
                    {{-- Kolom Kiri --}}
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>No KTP</label>
                            <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="" disabled selected>-- Pilih --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Email (Opsional)</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                    </div>

                    {{-- Kolom Kanan --}}
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Agama</label>
                            <input type="text" name="agama" class="form-control" value="{{ old('agama') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Telp (Opsional)</label>
                            <input type="text" name="telp" class="form-control" value="{{ old('telp') }}">
                        </div>
                    </div>
                </div>

                <hr>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</div>
@endsection