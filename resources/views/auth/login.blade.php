@extends('layouts.auth.app')

@section('content')

    {{-- ================================================= --}}
    {{-- CSS GOTHIC JUSTICE THEME (Disisipkan di sini)     --}}
    {{-- ================================================= --}}
    <style>
        /* Variabel Warna Old Library/Justice Gold */
        :root {
            --color-bg-main: #004D40;     /* Deep Teal/Hunter Green */
            --color-bg-card: #F9F9F9;     /* Off-White/Perkamen */
            --color-primary: #FFC107;     /* Aksen Emas/Gold */
            --color-secondary: #004D40;   /* Warna Text/Border Deep Teal */
        }

        /* Latar Belakang Body */
        body {
            background-color: var(--color-bg-main) !important;
        }

        /* Kartu Login Keseluruhan */
        .card-justice-gothic {
            border: 1px solid #BDBDBD !important;
            border-radius: 0.5rem !important; /* Kurangi lengkungan */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5) !important;
            font-family: 'Times New Roman', Times, serif; /* Font Klasik/Serif */
        }

        /* Latar Belakang Kolom Formulir (Kanan) */
        .bg-justice-card {
            background-color: var(--color-bg-card);
            border-radius: 0 0.5rem 0.5rem 0;
        }

        /* Kolom Kiri (Visual) - Menambahkan efek overlay monokrom */
        .bg-justice-overlay {
            position: relative;
            border-radius: 0.5rem 0 0 0.5rem;
            /* Filter untuk efek monochrome/sepia yang dramatis */
            filter: sepia(0.5) contrast(1.2) brightness(0.7);
        }

        /* Judul Utama */
        .h4.text-dark {
            color: var(--color-secondary) !important;
            font-size: 2rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Field Input Klasik */
        .form-control-justice {
            background-color: white !important;
            color: #212121 !important;
            border: 2px solid var(--color-secondary) !important; /* Border tegas Deep Teal */
            border-radius: 0 !important; /* Sudut Tegas */
            padding: 1rem 1rem 1rem 3.5rem !important;
        }
        .form-control-justice::placeholder {
            color: #757575 !important;
            font-style: italic;
        }
        .form-control-justice:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5) !important; /* Gold Glow */
            border-color: var(--color-primary) !important;
        }

        /* Icon Styling (Gold Aksen) */
        .icon-input-wrapper {
            position: relative;
        }
        .icon-inside-input {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: var(--color-primary); /* Warna Emas */
            font-size: 1.5rem;
            z-index: 10;
        }

        /* Tombol Login (Deep Green) */
        .btn-justice-green {
            background-color: var(--color-secondary) !important;
            border-color: var(--color-secondary) !important;
            color: var(--color-primary) !important; /* Teks Emas */
            font-weight: 900 !important;
            letter-spacing: 2px !important;
            padding: 0.9rem 1rem !important;
            border-radius: 0.2rem !important;
            text-transform: uppercase;
        }

        .btn-justice-green:hover {
            background-color: #00796B !important;
            border-color: #00796B !important;
        }

        /* HR Separator */
        .hr-justice-gothic {
            border-color: #BDBDBD !important;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        /* Teks Info Penting */
        .text-important {
            color: var(--color-secondary);
            font-style: italic;
            font-size: 0.9rem;
            margin-top: 1.5rem;
        }

        /* Link Aksen Gold */
        .text-gold-accent {
             color: var(--color-primary) !important;
             font-weight: bold;
             text-decoration: underline;
        }
    </style>

    {{-- ================================================= --}}
    {{-- HTML BLADE (Gothic Justice)                       --}}
    {{-- ================================================= --}}

    <div class="card o-hidden shadow-lg my-5 card-justice-gothic">
        <div class="card-body p-0">
            <div class="row">

                <div class="col-lg-6 d-none d-lg-block bg-login-image bg-justice-overlay"
                    style="background-image: url('{{ asset('assets-admin/images/pahlawan_monochrome.jpg') }}'); background-size: cover;">
                    </div>

                <div class="col-lg-6 bg-justice-card">
                    <div class="p-5">

                        <p class="text-important text-center">
                            "Keadilan yang tertunda adalah keadilan yang ditolak."
                        </p>

                        <div class="text-center">
                            <h1 class="h4 text-dark mb-4 mt-3">SISTEM LEGAL EKSKLUSIF</h1>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="user" action="#" method="POST"> @csrf

                            <div class="form-group icon-input-wrapper">
                                <i class="fas fa-scroll icon-inside-input"></i>
                                <input type="email" class="form-control form-control-user form-control-justice" id="email" name="email"
                                    aria-describedby="emailHelp" placeholder="Nomor Lisensi Advokat..." autofocus>
                            </div>

                            <div class="form-group icon-input-wrapper">
                                <i class="fas fa-balance-scale icon-inside-input"></i>
                                <input type="password" class="form-control form-control-user form-control-justice" id="password" name="password"
                                    placeholder="Kata Sandi Akses">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Simpan Sesi Akses</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-justice-green btn-user btn-block">
                                MASUK PORTAL
                            </button>
                        </form>

                        <hr class="hr-justice-gothic">

                        <div class="text-center">
                            <a class="small text-secondary" href="#">Kunci Akses Hilang?</a>
                        </div>
                        <div class="text-center">
                            <a class="small text-gold-accent" href="{{ url('/register') }}">Permintaan Lisensi Baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
