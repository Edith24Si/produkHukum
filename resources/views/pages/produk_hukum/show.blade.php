@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <a href="{{ route('produkHukum.index') }}" class="btn btn-secondary mb-3">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Produk Hukum</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 35%">Judul</th>
                                <td>{{ $dokumen->judul }}</td>
                            </tr>
                            <tr>
                                <th>Nomor</th>
                                <td>{{ $dokumen->nomor }}</td>
                            </tr>
                            <tr>
                                <th>Tahun</th>
                                <td>{{ $dokumen->tahun }}</td>
                            </tr>
                            <tr>
                                <th>Jenis</th>
                                <td>{{ $dokumen->jenisDokumen->nama_jenis ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $dokumen->kategoriDokumen->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Penetapan</th>
                                <td>{{ $dokumen->tanggal_penetapan }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">

                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary text-white">
                        <h6 class="m-0 font-weight-bold">Upload File Pendukung</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="ref_table" value="dokumens">
                            <input type="hidden" name="ref_id" value="{{ $dokumen->dokumen_id }}">

                            <div class="form-group">
                                <label>Pilih File (Bisa blok banyak file sekaligus)</label>
                                <input type="file" name="files[]" class="form-control p-1" multiple required>
                                <small class="text-muted">PDF, DOCX, XLSX, JPG. Max 10MB.</small>
                            </div>

                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fas fa-upload"></i> Upload Sekarang
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Berkas Terlampir</h6>
                    </div>
                    <div class="card-body">
                        @if($medias->count() > 0)
                            <div class="list-group">
                                @foreach($medias as $media)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="text-truncate mr-2">
                                            <i class="fas fa-file mr-2 text-gray-400"></i>
                                            <a href="{{ Storage::url($media->file_path) }}" target="_blank"
                                                class="font-weight-bold">
                                                {{ $media->file_name }}
                                            </a>
                                            <div class="small text-muted">{{ $media->created_at->diffForHumans() }}</div>
                                        </div>

                                        <form action="{{ route('media.destroy', $media->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus file ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center p-3 text-muted border rounded bg-light">
                                Belum ada file pendukung.
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection