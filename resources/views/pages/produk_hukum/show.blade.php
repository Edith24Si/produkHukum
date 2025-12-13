@extends('layouts.app')

@section('title', 'Detail Produk Hukum')

@section('content')
<div class="container-fluid">
    <!-- Header dengan Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('produkHukum.index') }}">Produk Hukum</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav>

    <!-- Alert Success -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Header dengan Judul dan Tombol Aksi -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800 font-weight-bold">
                <i class="fas fa-file-contract text-primary me-2"></i>Detail Produk Hukum
            </h1>
            <p class="text-muted mb-0">Informasi lengkap dokumen hukum</p>
        </div>

        <div class="btn-group">
            <a href="{{ route('produkHukum.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>

            @auth
                @if(Auth::user()->role == 'admin')
                    <a href="{{ route('produkHukum.edit', $dokumen->dokumen_id) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>
                    <form action="{{ route('produkHukum.destroy', $dokumen->dokumen_id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Hapus dokumen ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i> Hapus
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>

    <!-- Grid Utama -->
    <div class="row">
        <!-- Kolom Kiri: Informasi Utama -->
        <div class="col-lg-8 mb-4">
            <!-- Card Informasi Dokumen -->
            <div class="card border-left-primary shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-info-circle me-2"></i>Informasi Utama Dokumen
                    </h6>
                    <span class="badge bg-primary">ID: {{ $dokumen->dokumen_id }}</span>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-dark mb-3">{{ $dokumen->judul }}</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="text-muted" style="width: 40%"><strong><i class="fas fa-hashtag me-2"></i>Nomor</strong></td>
                                        <td><span class="badge bg-info text-dark">{{ $dokumen->nomor }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted"><strong><i class="fas fa-calendar-alt me-2"></i>Tahun</strong></td>
                                        <td>{{ $dokumen->tahun }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted"><strong><i class="fas fa-file-signature me-2"></i>Tanggal Penetapan</strong></td>
                                        <td>{{ \Carbon\Carbon::parse($dokumen->tanggal_penetapan)->translatedFormat('d F Y') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="text-muted" style="width: 40%"><strong><i class="fas fa-tag me-2"></i>Jenis</strong></td>
                                        <td>
                                            <span class="badge bg-success">
                                                {{ $dokumen->jenisDokumen->nama_jenis ?? '-' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted"><strong><i class="fas fa-folder me-2"></i>Kategori</strong></td>
                                        <td>
                                            <span class="badge bg-warning text-dark">
                                                {{ $dokumen->kategoriDokumen->nama ?? '-' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted"><strong><i class="fas fa-file-pdf me-2"></i>File Utama</strong></td>
                                        <td>
                                            @if($dokumen->file_path)
                                                <a href="{{ Storage::url($dokumen->file_path) }}"
                                                   target="_blank"
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-download me-1"></i>Download
                                                </a>
                                            @else
                                                <span class="text-muted">Tidak ada file</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card File Utama (jika ada) -->
            @if($dokumen->file_path)
            <div class="card border-left-success shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-file-pdf me-2"></i>File Dokumen Utama
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between p-3 border rounded bg-light">
                        <div>
                            <i class="fas fa-file-pdf fa-2x text-danger me-3"></i>
                            <span class="font-weight-bold">{{ basename($dokumen->file_path) }}</span>
                        </div>
                        <div>
                            <a href="{{ Storage::url($dokumen->file_path) }}"
                               target="_blank"
                               class="btn btn-primary me-2">
                                <i class="fas fa-eye me-1"></i>Lihat
                            </a>
                            <a href="{{ Storage::url($dokumen->file_path) }}"
                               download
                               class="btn btn-success">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Card Informasi Tambahan -->
            <div class="card border-left-info shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">
                        <i class="fas fa-info-circle me-2"></i>Informasi Tambahan
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="border rounded p-3 bg-light">
                                <small class="text-muted d-block">Dibuat</small>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-calendar-plus text-info me-2"></i>
                                    <span>{{ $dokumen->created_at->translatedFormat('d F Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="border rounded p-3 bg-light">
                                <small class="text-muted d-block">Terakhir Diperbarui</small>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-calendar-check text-info me-2"></i>
                                    <span>{{ $dokumen->updated_at->translatedFormat('d F Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Lampiran dan Upload -->
        <div class="col-lg-4">
            <!-- Card Upload File Pendukung -->
            <div class="card border-left-warning shadow mb-4">
                <div class="card-header py-3 bg-warning text-dark">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-upload me-2"></i>Tambah File Pendukung
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ref_table" value="dokumens">
                        <input type="hidden" name="ref_id" value="{{ $dokumen->dokumen_id }}">

                        <div class="mb-3">
                            <label class="form-label">Pilih File</label>
                            <input type="file" name="files[]" class="form-control" multiple required>
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Dapat memilih banyak file sekaligus (PDF, DOC, XLS, JPG, PNG)
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Keterangan (Opsional)</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Deskripsi file">
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-upload me-2"></i>Upload Sekarang
                        </button>
                    </form>
                </div>
            </div>

            <!-- Card Daftar Lampiran -->
            <div class="card border-left-primary shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-paperclip me-2"></i>File Pendukung
                        <span class="badge bg-primary rounded-pill float-end">{{ $medias->count() }}</span>
                    </h6>
                </div>
                <div class="card-body">
                    @if($medias->count() > 0)
                        <div class="list-group">
                            @foreach($medias as $media)
                                <div class="list-group-item list-group-item-action mb-2 border rounded">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            @php
                                                $extension = pathinfo($media->file_name, PATHINFO_EXTENSION);
                                                $icon = match(strtolower($extension)) {
                                                    'pdf' => 'file-pdf text-danger',
                                                    'doc', 'docx' => 'file-word text-primary',
                                                    'xls', 'xlsx' => 'file-excel text-success',
                                                    'jpg', 'jpeg', 'png', 'gif' => 'file-image text-info',
                                                    default => 'file text-secondary'
                                                };
                                            @endphp
                                            <i class="fas fa-{{ $icon }} fa-lg me-3"></i>
                                            <div>
                                                <div class="font-weight-bold text-truncate" style="max-width: 200px;">
                                                    {{ $media->file_name }}
                                                </div>
                                                <small class="text-muted">
                                                    {{ $media->created_at->diffForHumans() }}
                                                    @if($media->keterangan)
                                                        • {{ $media->keterangan }}
                                                    @endif
                                                </small>
                                            </div>
                                        </div>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ Storage::url($media->file_path) }}"
                                               target="_blank"
                                               class="btn btn-outline-primary"
                                               title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ Storage::url($media->file_path) }}"
                                               download
                                               class="btn btn-outline-success"
                                               title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <form action="{{ route('media.destroy', $media->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Hapus file ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <p class="text-muted mb-0">Belum ada file pendukung</p>
                            <small class="text-muted">Upload file menggunakan form di atas</small>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Card Statistik Ringkas -->
            <div class="card border-left-secondary shadow mt-4">
                <div class="card-header py-3 bg-secondary text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-chart-bar me-2"></i>Statistik
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="border rounded p-3">
                                <div class="text-muted small">Total File</div>
                                <div class="h4 mb-0">{{ $medias->count() + ($dokumen->file_path ? 1 : 0) }}</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border rounded p-3">
                                <div class="text-muted small">Diperbarui</div>
                                <div class="h6 mb-0">{{ $dokumen->updated_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Related Content atau Informasi Lain -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-left-dark shadow">
                <div class="card-header py-3 bg-dark text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-link me-2"></i>Dokumen Lainnya
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        @php
                            // Anda bisa menambahkan query untuk dokumen terkait di controller
                            $relatedDocuments = \App\Models\Dokumen::where('jenis_dokumen_id', $dokumen->jenis_dokumen_id)
                                ->where('dokumen_id', '!=', $dokumen->dokumen_id)
                                ->limit(3)
                                ->get();
                        @endphp

                        @if($relatedDocuments->count() > 0)
                            @foreach($relatedDocuments as $related)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100 border hover-shadow">
                                        <div class="card-body">
                                            <h6 class="card-title text-truncate">{{ $related->judul }}</h6>
                                            <p class="card-text small text-muted mb-2">
                                                <i class="fas fa-hashtag me-1"></i>{{ $related->nomor }}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <span class="badge bg-secondary">{{ $related->tahun }}</span>
                                                <a href="{{ route('produkHukum.show', $related->dokumen_id) }}"
                                                   class="btn btn-sm btn-outline-primary">
                                                    Lihat
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <div class="text-center py-3 text-muted">
                                    <i class="fas fa-info-circle fa-2x mb-2"></i>
                                    <p>Tidak ada dokumen terkait</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .hover-shadow:hover {
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        transform: translateY(-2px);
        transition: all 0.2s ease-in-out;
    }

    .breadcrumb {
        background-color: #f8f9fc;
        border-radius: .35rem;
        padding: 1rem 1.5rem;
    }

    .card-header {
        border-bottom: 1px solid #e3e6f0;
    }

    .border-left-primary {
        border-left: .25rem solid #4e73df!important;
    }

    .border-left-success {
        border-left: .25rem solid #1cc88a!important;
    }

    .border-left-info {
        border-left: .25rem solid #36b9cc!important;
    }

    .border-left-warning {
        border-left: .25rem solid #f6c23e!important;
    }

    .border-left-secondary {
        border-left: .25rem solid #858796!important;
    }

    .border-left-dark {
        border-left: .25rem solid #5a5c69!important;
    }

    .list-group-item {
        border: 1px solid #e3e6f0;
    }

    .badge {
        font-weight: 500;
    }
</style>
@endpush

@push('scripts')
<script>
    // Auto dismiss alert setelah 5 detik
    setTimeout(function() {
        $('.alert').alert('close');
    }, 5000);
</script>
@endpush
