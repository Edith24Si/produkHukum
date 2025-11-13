@extends('layouts.guest')

@section('title', 'Layanan Kami')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Layanan Desa</h1>
        <p class="fs-5 text-muted">Kami menyediakan berbagai layanan untuk warga.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body p-4">
                    <i class="fas fa-file-alt fa-3x text-primary mb-3"></i>
                    <h5 class="card-title fw-bold">Produk Hukum</h5>
                    <p class="card-text">Akses mudah ke Peraturan Desa, SK Kades, dan dokumen hukum lainnya.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body p-4">
                    <i class="fas fa-id-card fa-3x text-success mb-3"></i>
                    <h5 class="card-title fw-bold">Administrasi Kependudukan</h5>
                    <p class="card-text">Layanan pengurusan KTP, Kartu Keluarga, dan surat pindah.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center">
                <div class="card-body p-4">
                    <i class="fas fa-hands-helping fa-3x text-warning mb-3"></i>
                    <h5 class="card-title fw-bold">Layanan Sosial</h5>
                    <p class="card-text">Bantuan sosial, data kemiskinan, dan program pemberdayaan masyarakat.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection