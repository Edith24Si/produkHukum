@extends('layouts.guest')

@section('title', 'Kontak Kami')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Hubungi Kami</h1>
        <p class="fs-5 text-muted">Kami siap mendengar dari Anda.</p>
    </div>

    <div class="row g-5">
        <div class="col-md-6">
            <h4 class="fw-bold">Informasi Kontak</h4>
            <ul class="list-unstyled mt-3">
                <li class="mb-3 d-flex">
                    <i class="fas fa-map-marker-alt fa-lg text-primary me-3 mt-1"></i>
                    <span>Jl. Raya Desa Binaan No. 123, Kecamatan Maju, Kabupaten Jaya, 45678</span>
                </li>
                <li class="mb-3 d-flex">
                    <i class="fas fa-phone fa-lg text-primary me-3 mt-1"></i>
                    <span>(021) 123-4567</span>
                </li>
                <li class="mb-3 d-flex">
                    <i class="fas fa-envelope fa-lg text-primary me-3 mt-1"></i>
                    <span>info@desabinaan.id</span>
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <h4 class="fw-bold">Kirim Pesan</h4>
            <form action="#" method="POST" class="mt-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Anda</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Anda</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Pesan Anda</label>
                    <textarea class="form-control" id="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>
@endsection