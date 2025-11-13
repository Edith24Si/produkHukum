@extends('layouts.guest')

{{-- Ini akan mengisi @yield('title') di layout --}}
@section('title', 'Beranda - Website Desa')

{{-- Ini akan mengisi @yield('content') di layout --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center p-5 mb-4 bg-light rounded-3">
                <h1 class="display-5 fw-bold">Selamat Datang di Website Desa</h1>
                <p class="fs-4">Ini adalah halaman beranda untuk publik (guest).</p>
                <p>Kami menyediakan informasi dan layanan produk hukum untuk warga.</p>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h3>Tentang Kami</h3>
                    <p>Pelajari lebih lanjut tentang sejarah dan visi misi desa kami.</p>
                    <a href="{{ route('tentang') }}" class="btn btn-secondary">Selengkapnya &raquo;</a>
                </div>
                <div class="col-md-4">
                    <h3>Layanan</h3>
                    <p>Lihat berbagai layanan administrasi dan publik yang kami tawarkan.</p>
                    <a href="{{ route('layanan') }}" class="btn btn-secondary">Selengkapnya &raquo;</a>
                </div>
                <div class="col-md-4">
                    <h3>Kontak</h3>
                    <p>Hubungi kami jika Anda memiliki pertanyaan atau membutuhkan bantuan.</p>
                    <a href="{{ route('kontak') }}" class="btn btn-secondary">Selengkapnya &raquo;</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection