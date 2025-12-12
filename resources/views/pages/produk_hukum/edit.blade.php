@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Produk Hukum</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Dokumen</h6>
            </div>
            <div class="card-body">
                {{-- Menggunakan route update dengan parameter ID --}}
                <form action="{{ route('produkHukum.update', $dokumen->dokumen_id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Judul Dokumen</label>
                            <input type="text" class="form-control" name="judul" value="{{ old('judul', $dokumen->judul) }}"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Jenis Dokumen</label>
                            <select class="form-control" name="jenis_dokumen_id" required>
                                @foreach ($jenisDokumens as $jenis)
                                    <option value="{{ $jenis->id }}" {{ $dokumen->jenis_dokumen_id == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->nama_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Kategori Dokumen</label>
                            <select class="form-control" name="kategori_dokumen_id" required>
                                @foreach ($kategoriDokumens as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $dokumen->kategori_dokumen_id == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Nomor</label>
                            <input type="text" class="form-control" name="nomor" value="{{ old('nomor', $dokumen->nomor) }}"
                                required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Tahun</label>
                            <input type="number" class="form-control" name="tahun"
                                value="{{ old('tahun', $dokumen->tahun) }}" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Tanggal Penetapan</label>
                            <input type="date" class="form-control" name="tanggal_penetapan"
                                value="{{ old('tanggal_penetapan', $dokumen->tanggal_penetapan) }}" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Ganti File Utama (Opsional)</label>
                            <input type="file" class="form-control p-1" name="file_dokumen">
                            @if($dokumen->file_path)
                                <small class="text-success">File saat ini: <a href="{{ Storage::url($dokumen->file_path) }}"
                                        target="_blank">Lihat File</a></small>
                            @else
                                <small class="text-muted">Belum ada file utama diupload.</small>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning">Update Data</button>
                    <a href="{{ route('produkHukum.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
