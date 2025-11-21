@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Produk Hukum Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Input Dokumen</h6>
        </div>
        <div class="card-body">
            {{-- KOREKSI: Tambahkan enctype untuk mendukung file upload --}}
            <form action="{{ route('produkHukum.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    {{-- Judul --}}
                    <div class="col-md-12 mb-3">
                        <label for="judul" class="form-label">Judul Dokumen:</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jenis Dokumen (Dropdown) --}}
                    <div class="col-md-6 mb-3">
                        <label for="jenis_dokumen_id" class="form-label">Jenis Dokumen:</label>
                        <select class="form-control @error('jenis_dokumen_id') is-invalid @enderror" id="jenis_dokumen_id" name="jenis_dokumen_id" required>
                            <option value="">-- Pilih Jenis Dokumen --</option>
                            @foreach ($jenisDokumens as $jenis)
                                <option value="{{ $jenis->id }}" {{ old('jenis_dokumen_id') == $jenis->id ? 'selected' : '' }}>
                                    {{ $jenis->nama_jenis }}
                                </option>
                            @endforeach
                        </select>
                        @error('jenis_dokumen_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kategori Dokumen (Dropdown) --}}
                    <div class="col-md-6 mb-3">
                        <label for="kategori_dokumen_id" class="form-label">Kategori Dokumen:</label>
                        <select class="form-control @error('kategori_dokumen_id') is-invalid @enderror" id="kategori_dokumen_id" name="kategori_dokumen_id" required>
                            <option value="">-- Pilih Kategori Dokumen --</option>
                            @foreach ($kategoriDokumens as $kategori)
                                <option value="{{ $kategori->id }}" {{ old('kategori_dokumen_id') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_dokumen_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Nomor --}}
                    <div class="col-md-4 mb-3">
                        <label for="nomor" class="form-label">Nomor:</label>
                        <input type="number" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" value="{{ old('nomor') }}" required>
                        @error('nomor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tahun --}}
                    <div class="col-md-4 mb-3">
                        <label for="tahun" class="form-label">Tahun:</label>
                        <input type="number" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun') }}" required min="1900" max="{{ date('Y') }}">
                        @error('tahun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tanggal Penetapan --}}
                    <div class="col-md-4 mb-3">
                        <label for="tanggal_penetapan" class="form-label">Tanggal Penetapan:</label>
                        <input type="date" class="form-control @error('tanggal_penetapan') is-invalid @enderror" id="tanggal_penetapan" name="tanggal_penetapan" value="{{ old('tanggal_penetapan') }}" required>
                        @error('tanggal_penetapan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- KOREKSI: Tambahkan field untuk File Dokumen --}}
                    <div class="col-md-12 mb-3">
                        <label for="file_dokumen" class="form-label">Unggah File Dokumen (PDF/DOCX/dls):</label>
                        <input type="file" class="form-control @error('file_dokumen') is-invalid @enderror" id="file_dokumen" name="file_dokumen">
                        <small class="form-text text-muted">Maksimal ukuran file: 5MB</small>
                        @error('file_dokumen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success me-2">Simpan Dokumen</button>
                    <a href="{{ route('produkHukum.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
