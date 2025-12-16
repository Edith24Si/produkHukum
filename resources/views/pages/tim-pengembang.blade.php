@extends('layouts.app')

@section('title', 'Tim Pengembang')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tim Pengembang Website</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tim Pengembang</li>
            </ol>
        </nav>
    </div>

    <!-- Alert Info -->
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-users mr-2"></i>
        <strong>Identitas Developer</strong> - Berikut adalah data lengkap anggota tim yang mengembangkan sistem ini.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!-- Developer Cards Grid -->
    <div class="row">
        @foreach($developers as $developer)
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow h-100 border-0">
                <!-- Header dengan Background -->
                <div class="card-header py-3" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="text-center">
                        <!-- Foto Developer -->
                        <div class="position-relative d-inline-block">
                            <img src="{{ $developer['photo_url'] }}"
                                 alt="Foto {{ $developer['name'] }}"
                                 class="img-fluid rounded-circle border border-4 border-white shadow"
                                 style="width: 140px; height: 140px; object-fit: cover;">
                            <span class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-3 border-white"
                                  style="width: 20px; height: 20px;"></span>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Nama dan Role -->
                    <div class="text-center mb-3">
                        <h4 class="font-weight-bold text-gray-800 mb-1">{{ $developer['name'] }}</h4>
                        <span class="badge badge-primary px-3 py-2">{{ $developer['role'] }}</span>
                    </div>

                    <!-- Data Identitas -->
                    <div class="developer-info mb-4">
                        <!-- NIM -->
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-id-card text-primary mr-3" style="width: 20px;"></i>
                            <div>
                                <small class="text-muted d-block">NIM</small>
                                <strong>{{ $developer['nim'] }}</strong>
                            </div>
                        </div>

                        <!-- Prodi -->
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-graduation-cap text-primary mr-3" style="width: 20px;"></i>
                            <div>
                                <small class="text-muted d-block">Program Studi</small>
                                <strong>{{ $developer['prodi'] }}</strong>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-envelope text-primary mr-3" style="width: 20px;"></i>
                            <div>
                                <small class="text-muted d-block">Email</small>
                                <a href="mailto:{{ $developer['email'] }}" class="text-decoration-none">
                                    <strong>{{ $developer['email'] }}</strong>
                                </a>
                            </div>
                        </div>

                        <!-- Spesialisasi -->
                        <div class="d-flex align-items-start">
                            <i class="fas fa-tools text-primary mr-3 mt-1" style="width: 20px;"></i>
                            <div>
                                <small class="text-muted d-block">Spesialisasi</small>
                                <small class="text-gray-600">{{ $developer['specialization'] }}</small>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    <div class="text-center mt-4 pt-3 border-top">
                        <h6 class="text-muted mb-3">Temukan Saya di:</h6>
                        <div class="social-links d-flex justify-content-center">
                            <!-- LinkedIn -->
                            @if($developer['linkedin'])
                            <a href="{{ $developer['linkedin'] }}" target="_blank"
                               class="btn btn-sm btn-social mx-1"
                               title="LinkedIn"
                               style="background-color: #0077b5; color: white;">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            @endif

                            <!-- GitHub -->
                            @if($developer['github'])
                            <a href="{{ $developer['github'] }}" target="_blank"
                               class="btn btn-sm btn-social mx-1"
                               title="GitHub"
                               style="background-color: #333; color: white;">
                                <i class="fab fa-github"></i>
                            </a>
                            @endif

                            <!-- Twitter -->
                            @if($developer['twitter'])
                            <a href="{{ $developer['twitter'] }}" target="_blank"
                               class="btn btn-sm btn-social mx-1"
                               title="Twitter"
                               style="background-color: #1da1f2; color: white;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            @endif

                            <!-- Instagram -->
                            @if($developer['instagram'])
                            <a href="{{ $developer['instagram'] }}" target="_blank"
                               class="btn btn-sm btn-social mx-1"
                               title="Instagram"
                               style="background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); color: white;">
                                <i class="fab fa-instagram"></i>
                            </a>
                            @endif

                            <!-- WhatsApp -->
                            @if($developer['whatsapp'])
                            <a href="{{ $developer['whatsapp'] }}" target="_blank"
                               class="btn btn-sm btn-social mx-1"
                               title="WhatsApp"
                               style="background-color: #25d366; color: white;">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Team Description -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle mr-2"></i>Tentang Tim Pengembang
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Tim pengembang ini terdiri dari mahasiswa yang memiliki minat dan keahlian
                        dalam pengembangan perangkat lunak. Dengan semangat kolaborasi dan inovasi,
                        tim berhasil mengembangkan sistem Portal Hukum Desa ini untuk memudahkan
                        administrasi dan transparansi hukum di tingkat desa.
                    </p>
                    <div class="row mt-4">
                        <div class="col-md-4 text-center">
                            <i class="fas fa-code fa-3x text-primary mb-3"></i>
                            <h5>Pengembangan Modern</h5>
                            <p class="text-muted">Menggunakan teknologi terbaru dalam pengembangan web</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="fas fa-users fa-3x text-success mb-3"></i>
                            <h5>Kolaborasi Tim</h5>
                            <p class="text-muted">Bekerja sama dalam pengembangan fitur dan testing</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="fas fa-lightbulb fa-3x text-warning mb-3"></i>
                            <h5>Inovasi</h5>
                            <p class="text-muted">Terus berinovasi untuk meningkatkan pengalaman pengguna</p>
                        </div>
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
        background-color: #f8fafc;
        padding: 20px;
        border-radius: 10px;
        border-left: 4px solid #4e73df;
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
    }

    .btn-social {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        transition: all 0.3s ease;
    }

    .btn-social:hover {
        transform: scale(1.1);
    }

    .badge {
        font-size: 0.9rem;
        font-weight: 500;
    }
</style>
@endpush

@push('js')
<script>
    // Smooth hover effect for cards
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.zIndex = 100;
            });
            card.addEventListener('mouseleave', function() {
                this.style.zIndex = 1;
            });
        });
    });
</script>
@endpush
