@extends('layouts.app')

@section('title', 'Tim Pengembang')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tim Pengembang</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tim Pengembang</li>
            </ol>
        </nav>
    </div>

    <!-- Petunj Upload Foto -->
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle mr-2"></i>
        <strong>Petunjuk Menggunakan Foto Asli:</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul class="mb-0 mt-2 pl-3">
            <li>Siapkan foto asli dengan format JPG atau PNG (ukuran minimal 400x400px)</li>
            <li>Simpan foto di folder: <code>public/images/tim/</code></li>
            <li>Nama file: <strong>foto-[nama].jpg</strong> (contoh: foto-ahmad.jpg)</li>
            <li>Foto akan muncul otomatis jika ditemukan, jika tidak akan menggunakan placeholder</li>
        </ul>
    </div>

    <!-- Developer Cards Grid -->
    <div class="row">
        @foreach($developers as $developer)
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-center mb-3">
                                <!-- Foto Developer -->
                                <img src="{{ $developer['photo_url'] }}"
                                     alt="Foto {{ $developer['name'] }}"
                                     class="img-fluid rounded-circle border"
                                     style="width: 120px; height: 120px; object-fit: cover;"
                                     onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($developer['name']) }}&size=200&background=3498db&color=fff'">
                            </div>

                            <!-- Nama dan Role -->
                            <div class="text-center mb-3">
                                <h5 class="font-weight-bold text-primary mb-1">{{ $developer['name'] }}</h5>
                                <span class="badge badge-success">{{ $developer['role'] }}</span>
                            </div>

                            <!-- Data Pribadi -->
                            <div class="developer-info mb-3">
                                <div class="row mb-2">
                                    <div class="col-4 font-weight-bold text-gray-800">NIM:</div>
                                    <div class="col-8">{{ $developer['nim'] }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4 font-weight-bold text-gray-800">Prodi:</div>
                                    <div class="col-8">{{ $developer['prodi'] }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4 font-weight-bold text-gray-800">Email:</div>
                                    <div class="col-8">
                                        <a href="mailto:{{ $developer['email'] }}" class="text-decoration-none">
                                            {{ $developer['email'] }}
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 font-weight-bold text-gray-800">Spesialisasi:</div>
                                    <div class="col-8">
                                        <small>{{ $developer['specialization'] }}</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Media Links -->
                            <div class="text-center mt-4 pt-3 border-top">
                                <div class="social-links d-flex justify-content-center">
                                    @if($developer['linkedin'])
                                    <a href="{{ $developer['linkedin'] }}" target="_blank" class="btn btn-sm btn-outline-primary mx-1" title="LinkedIn">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    @endif

                                    @if($developer['github'])
                                    <a href="{{ $developer['github'] }}" target="_blank" class="btn btn-sm btn-outline-dark mx-1" title="GitHub">
                                        <i class="fab fa-github"></i>
                                    </a>
                                    @endif

                                    @if($developer['twitter'])
                                    <a href="{{ $developer['twitter'] }}" target="_blank" class="btn btn-sm btn-outline-info mx-1" title="Twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    @endif

                                    @if($developer['instagram'])
                                    <a href="{{ $developer['instagram'] }}" target="_blank" class="btn btn-sm btn-outline-danger mx-1" title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Video Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-video mr-2"></i>Video Terbaru
                    </h6>
                    <a href="#" class="btn btn-sm btn-primary">Lihat Semua Video</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($videos as $video)
                        <div class="col-lg-4 mb-4">
                            <div class="card h-100 border-left-info shadow-sm">
                                <div class="card-body">
                                    <h6 class="card-title font-weight-bold text-gray-800">{{ $video['title'] }}</h6>
                                    <p class="card-text text-muted small">
                                        <i class="fas fa-user mr-1"></i> {{ $video['author'] }}
                                    </p>
                                    <div class="text-center mt-3">
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-play-circle mr-1"></i> Tonton Video
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white mt-5">
        <div class="container my-auto">
            <div class="copyright text-center my-4">
                <span>© {{ date('Y') }} Portal Hukum Desa. Dibangun dengan ❤️ oleh Tim Pengembang.</span>
            </div>
        </div>
    </footer>
</div>
@endsection

@push('css')
<style>
    .developer-info {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        border-left: 4px solid #4e73df;
    }

    .developer-info .row {
        padding: 3px 0;
    }

    .developer-info .col-4 {
        font-size: 0.9rem;
    }

    .developer-info .col-8 {
        font-size: 0.9rem;
        color: #5a5c69;
    }

    .social-links .btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }

    .card:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
    }
</style>
@endpush
