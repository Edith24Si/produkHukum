@extends('layouts.app')

@section('title', 'Riwayat Perubahan Dokumen')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Perubahan Dokumen</h1>
        <div class="d-flex gap-2">
            <form method="GET" action="{{ route('riwayat-perubahan.index') }}" class="d-flex gap-2">
                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Cari uraian perubahan..."
                       value="{{ request('search') }}"
                       style="width: 250px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
                @if(request()->has('search') || request()->has('dokumen_id'))
                    <a href="{{ route('riwayat-perubahan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                    </a>
                @endif
            </form>
        </div>
    </div>

    <!-- Filter Info -->
    @if(request()->has('dokumen_id'))
    <div class="alert alert-info mb-4">
        <i class="fas fa-filter"></i>
        Menampilkan riwayat untuk dokumen ID: {{ request('dokumen_id') }}
        <a href="{{ route('riwayat-perubahan.index') }}" class="float-end">Tampilkan Semua</a>
    </div>
    @endif

    <!-- Data Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-history me-2"></i>Daftar Riwayat Perubahan
            </h6>
        </div>
        <div class="card-body">
            @if($riwayat->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">Tanggal</th>
                            <th width="20%">Dokumen</th>
                            <th width="10%">Versi</th>
                            <th width="40%">Uraian Perubahan</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayat as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                <div class="text-center">
                                    <div class="font-weight-bold">{{ $item->tanggal->format('d/m/Y') }}</div>
                                    <small class="text-muted">{{ $item->created_at->format('H:i') }}</small>
                                </div>
                            </td>
                            <td>
                                @if($item->dokumen)
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                             style="width: 30px; height: 30px; font-size: 0.8rem;">
                                            <i class="fas fa-file-alt"></i>
                                        </div>
                                        <div>
                                            <div class="font-weight-bold">{{ Str::limit($item->dokumen->judul, 40) }}</div>
                                            <small class="text-muted">No: {{ $item->dokumen->nomor }}</small>
                                        </div>
                                    </div>
                                @else
                                    <span class="text-muted">Dokumen tidak ditemukan</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $item->versi }}</span>
                            </td>
                            <td>
                                <div class="text-truncate" style="max-width: 400px;"
                                     title="{{ $item->uraian_perubahan }}">
                                    {{ $item->uraian_perubahan }}
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('riwayat-perubahan.show', $item->riwayat_id) }}"
                                   class="btn btn-sm btn-outline-primary"
                                   title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if($item->dokumen)
                                <a href="{{ route('riwayat-perubahan.index') }}?dokumen_id={{ $item->dokumen_id }}"
                                   class="btn btn-sm btn-outline-secondary"
                                   title="Lihat Riwayat Dokumen Ini">
                                    <i class="fas fa-filter"></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $riwayat->links() }}
            </div>
            @else
            <div class="text-center py-5">
                <i class="fas fa-history fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Belum ada riwayat perubahan</h5>
                <p class="text-muted">Riwayat perubahan akan tercatat secara otomatis ketika ada perubahan pada dokumen.</p>
            </div>
            @endif
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-6">
                    <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Total: {{ $riwayat->total() }} riwayat perubahan
                    </small>
                </div>
                <div class="col-md-6 text-end">
                    <small class="text-muted">
                        Update terakhir: {{ now()->format('d/m/Y H:i') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table-hover tbody tr:hover {
        background-color: rgba(78, 115, 223, 0.05);
    }
    .badge {
        font-size: 0.85em;
        padding: 0.35em 0.65em;
    }
</style>
@endpush
