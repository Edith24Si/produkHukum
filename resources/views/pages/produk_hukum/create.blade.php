@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Produk Hukum</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Dokumen</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('produkHukum.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Judul Dokumen <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="judul" value="{{ old('judul') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Jenis Dokumen <span class="text-danger">*</span></label>
                            <select class="form-control" name="jenis_dokumen_id" required>
                                <option value="">-- Pilih Jenis --</option>
                                @foreach ($jenisDokumens as $jenis)
                                    <option value="{{ $jenis->id }}" {{ old('jenis_dokumen_id') == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->nama_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Kategori Dokumen <span class="text-danger">*</span></label>
                            <select class="form-control" name="kategori_dokumen_id" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategoriDokumens as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_dokumen_id') == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Nomor <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nomor" value="{{ old('nomor') }}" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Tahun <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="tahun" value="{{ old('tahun', date('Y')) }}"
                                required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Tanggal Penetapan <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tanggal_penetapan"
                                value="{{ old('tanggal_penetapan') }}" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>File Dokumen Utama (Opsional)</label>
                            <input type="file" class="form-control p-1" name="file_dokumen">
                            <small class="text-muted">Upload naskah asli (PDF/Word). Lampiran pendukung bisa diupload di
                                halaman detail setelah disimpan.</small>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    <a href="{{ route('produkHukum.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection