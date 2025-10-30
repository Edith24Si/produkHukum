@extends('layouts.app')
{{-- (Asumsi nama layout utama Anda adalah app.blade.php) --}}

@section('title', 'Edit Data Warga')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Edit Data Warga</h1>

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

            <form action="{{ route('warga.update', $warga->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- PENTING untuk method update --}}

                <div class="row">
                    {{-- Kolom Kiri --}}
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>No KTP</label>
                            <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp', $warga->no_ktp) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="" disabled>-- Pilih --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $warga->pekerjaan) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Email (Opsional)</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $warga->email) }}">
                        </div>
                    </div>

                    {{-- Kolom Kanan --}}
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama', $warga->nama) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Agama</label>
                            <input type="text" name="agama" class="form-control" value="{{ old('agama', $warga->agama) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Telp (Opsional)</label>
                            <input type="text" name="telp" class="form-control" value="{{ old('telp', $warga->telp) }}">
                        </div>
                    </div>
                </div>

                <hr>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</div>
@endsection