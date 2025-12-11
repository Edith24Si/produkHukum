@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Lampiran Dokumen</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Lampiran</h6>
            </div>
            <div class="card-body">
                {{--
                PERBAIKAN:
                1. Nama route diganti jadi 'lampiranDokumen.update' (sesuai web.php)
                2. Parameter ID diganti jadi $lampiran->id (sesuai migration)
                3. Tambahkan enctype="multipart/form-data" agar bisa update file
                --}}
                <form action="{{ route('lampiranDokumen.update', $lampiran->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Pilih Dokumen Induk --}}
                    <div class="mb-3">
                        <label for="dokumen_id" class="form-label">Dokumen Induk</label>
                        <select name="dokumen_id" id="dokumen_id"
                            class="form-control @error('dokumen_id') is-invalid @enderror">
                            <option value="">-- Pilih Dokumen --</option>
                            @foreach($dokumens as $d)
                                <option value="{{ $d->dokumen_id }}" {{ (old('dokumen_id', $lampiran->dokumen_id) == $d->dokumen_id) ? 'selected' : '' }}>
                                    {{ $d->judul }}
                                </option>
                            @endforeach
                        </select>
                        @error('dokumen_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Keterangan --}}
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan"
                            class="form-control @error('keterangan') is-invalid @enderror"
                            value="{{ old('keterangan', $lampiran->keterangan) }}">
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- File Lampiran (Opsional saat edit) --}}
                    <div class="mb-3">
                        <label for="file_lampiran" class="form-label">Ganti File (Opsional)</label>
                        <input type="file" name="file_lampiran" id="file_lampiran"
                            class="form-control @error('file_lampiran') is-invalid @enderror">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah file saat ini:
                            <a href="{{ Storage::url($lampiran->file_path) }}"
                                target="_blank">{{ basename($lampiran->file_path) }}</a>
                        </small>
                        @error('file_lampiran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('lampiranDokumen.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection