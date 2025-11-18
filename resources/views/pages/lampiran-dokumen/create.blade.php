@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Lampiran Dokumen</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Unggah Lampiran</h6>
        </div>
        <div class="card-body">
            {{-- Pastikan enctype="multipart/form-data" untuk unggah file --}}
            <form action="{{ route('lampiranDokumen.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Pilih Dokumen Induk --}}
                <div class="mb-3">
                    <label for="dokumen_id" class="form-label">Pilih Dokumen Induk:</label>
                    <select class="form-control @error('dokumen_id') is-invalid @enderror" id="dokumen_id" name="dokumen_id" required>
                        <option value="">-- Pilih Dokumen --</option>
                        {{-- Loop daftar Dokumen yang diambil dari controller --}}
                        @foreach ($dokumens as $dokumen)
                            <option value="{{ $dokumen->id }}" {{ old('dokumen_id') == $dokumen->id ? 'selected' : '' }}>
                                {{ $dokumen->judul }} (No: {{ $dokumen->nomor }} Tahun: {{ $dokumen->tahun }})
                            </option>
                        @endforeach
                    </select>
                    @error('dokumen_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Unggah File Lampiran --}}
                <div class="mb-3">
                    <label for="file_lampiran" class="form-label">File Lampiran (PDF/DOCX/dls):</label>
                    <input type="file" class="form-control @error('file_lampiran') is-invalid @enderror" id="file_lampiran" name="file_lampiran" required>
                    <small class="form-text text-muted">Maksimal ukuran file: 5MB</small>
                    @error('file_lampiran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Keterangan --}}
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan (Opsional):</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success me-2">Simpan Lampiran</button>
                    <a href="{{ route('lampiranDokumen.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
