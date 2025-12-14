@extends('layouts.app')

@section('title', 'Detail Riwayat Perubahan')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Riwayat Perubahan</h1>
        <a href="{{ route('riwayat-perubahan.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <!-- Detail Card -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-info-circle me-2"></i>Informasi Perubahan
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>ID Riwayat:</strong>
                            <p class="mt-1">{{ $riwayatPerubahan->riwayat_id }}</p>
                        </div>
                        <div class="col-md-4">
                            <strong>Tanggal Perubahan:</strong>
                            <p class="mt-1">{{ $riwayatPerubahan->tanggal->format('d F Y') }}</p>
                        </div>
                        <div class="col-md-4">
                            <strong>Waktu:</strong>
                            <p class="mt-1">{{ $riwayatPerubahan->created_at->format('H:i:s') }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Versi:</strong>
                            <p class="mt-1">
                                <span class="badge bg-info">{{ $riwayatPerubahan->versi }}</span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <strong>Dokumen ID:</strong>
                            <p class="mt-1">
                                @if($riwayatPerubahan->dokumen)
                                    <a href="{{ route('riwayat-perubahan.index') }}?dokumen_id={{ $riwayatPerubahan->dokumen_id }}"
                                       class="text-decoration-none">
                                        {{ $riwayatPerubahan->dokumen_id }}
                                        <i class="fas fa-external-link-alt ms-1"></i>
                                    </a>
                                @else
                                    {{ $riwayatPerubahan->dokumen_id }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <strong>Uraian Perubahan:</strong>
                        <div class="card mt-2">
                            <div class="card-body bg-light">
                                {{ $riwayatPerubahan->uraian_perubahan }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <strong>Dibuat pada:</strong>
                            <p class="mt-1">{{ $riwayatPerubahan->created_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Diperbarui pada:</strong>
                            <p class="mt-1">{{ $riwayatPerubahan->updated_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dokumen Info -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-info text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-file-alt me-2"></i>Informasi Dokumen
                    </h6>
                </div>
                <div class="card-body">
                    @if($riwayatPerubahan->dokumen)
                        <div class="text-center mb-3">
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px; font-size: 1.5rem;">
                                <i class="fas fa-gavel"></i>
                            </div>
                        </div>

                        <h6 class="font-weight-bold">{{ $riwayatPerubahan->dokumen->judul }}</h6>

                        <div class="mt-3">
                            <p><strong>Nomor:</strong><br>{{ $riwayatPerubahan->dokumen->nomor }}</p>
                            <p><strong>Tahun:</strong><br>{{ $riwayatPerubahan->dokumen->tahun }}</p>
                            <p><strong>Status:</strong><br>
                                <span class="badge bg-{{ $riwayatPerubahan->dokumen->status == 'Berlaku' ? 'success' : 'warning' }}">
                                    {{ $riwayatPerubahan->dokumen->status }}
                                </span>
                            </p>
                        </div>

                        <div class="mt-4">
                            <a href="#" class="btn btn-primary btn-block">
                                <i class="fas fa-external-link-alt me-1"></i> Lihat Dokumen
                            </a>
                            <a href="{{ route('riwayat-perubahan.index') }}?dokumen_id={{ $riwayatPerubahan->dokumen_id }}"
                               class="btn btn-outline-info btn-block mt-2">
                                <i class="fas fa-history me-1"></i> Riwayat Dokumen Ini
                            </a>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-exclamation-triangle fa-2x text-warning mb-3"></i>
                            <p class="text-muted">Dokumen tidak ditemukan atau telah dihapus</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
