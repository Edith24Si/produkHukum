@extends('layouts.auth.app')

@section('content')

    {{-- ================================================= --}}
    {{-- CSS DARK MODE HUKUM THEME (Disisipkan di sini)    --}}
    {{-- ================================================= --}}
    <style>
        /* Variabel Warna Dark Mode Hukum */
        :root {
            --color-bg-main: #1e0e0e;     /* Sangat Gelap/Hampir Hitam */
            --color-bg-card: #430202;     /* Dark Card Background */
            --color-primary: #B71C1C;     /* Deep Maroon/Red Aksen */
            --color-secondary: #FFD700;   /* Gold/Emas untuk Ikon dan Garis */
            --color-text: #E0E0E0;        /* Light Gray Text */
        }

        /* Latar Belakang Body */
        body {
            background-color: var(--color-bg-main:#1e0e0e ) !important; /* GANTI WARNA LATAR BELAKANG DI SINI */
        }

        /* Kartu Login Keseluruhan */
        .card-dark-justice {
            border: none !important;
            border-radius: 0.8rem !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.7) !important;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
            background-color: var(--color-bg-card #1e0e0e); /* Latar belakang card gelap */
        }

        /* Latar Belakang Kolom Formulir (Kanan) */
        .bg-dark-form {
            background-color: var(--color-bg-card);
            color: var(--color-text);
        }

        /* Kolom Kiri (Visual) - Kontainer Logo Emas */
        .bg-garuda-timbangan {
            position: relative;
            background-color: #000000; /* Hitam pekat untuk kontras logo */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 3rem;
            border-radius: 0.8rem 0 0 0.8rem;
        }

        /* Simulasikan Logo Timbangan Emas Besar (Menggunakan Font Awesome) */
        .large-justice-icon {
            color: var(--color-secondary); /* Emas */
            font-size: 8rem; /* Ukuran besar */
            margin-bottom: 1rem;
            filter: drop-shadow(0 0 5px rgba(255, 215, 0, 0.5)); /* Efek glow lembut */
        }

        /* Judul Utama */
        .h4.text-portal-title {
            color: var(--color-primary) !important; /* Merah */
            font-size: 2.2rem;
            font-weight: 900;
            text-transform: uppercase;
            line-height: 1.2;
            margin-top: 1rem;
        }

        /* Sub Judul/Deskripsi */
        .text-portal-desc {
            color: var(--color-text);
            font-size: 1rem;
            margin-top: 0.5rem;
        }

        /* Field Input Dark Mode */
        .form-control-dark {
            background-color: #313131 !important;
            color: var(--color-text) !important;
            border: 1px solid #505050 !important;
            border-radius: 0.5rem !important;
            padding: 1rem 1rem 1rem 3.5rem !important;
        }
        .form-control-dark::placeholder {
            color: #A0A0A0 !important;
            font-style: italic;
        }
        .form-control-dark:focus {
            box-shadow: 0 0 0 0.2rem rgba(183, 28, 28, 0.5) !important; /* Maroon Glow */
            border-color: var(--color-primary) !important;
        }

        /* Icon Styling (Gold/Emas Aksen) */
        .icon-input-wrapper {
            position: relative;
        }
        .icon-inside-input {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: var(--color-primary); /* Warna Maroon di dalam input */
            font-size: 1.4rem;
            z-index: 10;
        }

        /* Tombol Login (Deep Red/Maroon) */
        .btn-portal-red {
            background-color: var(--color-primary) !important;
            border-color: var(--color-primary) !important;
            color: white !important;
            font-weight: bold !important;
            letter-spacing: 1px !important;
            padding: 0.9rem 1rem !important;
            border-radius: 0.5rem !important;
            text-transform: uppercase;
        }

        .btn-portal-red:hover {
            background-color: #D32F2F !important;
            border-color: #D32F2F !important;
        }

        /* Link Bawah */
        .text-footer-link {
            color: var(--color-text) !important;
            font-weight: 500;
        }
        .text-footer-link:hover {
            color: var(--color-primary) !important;
        }

        /* HR Separator */
        .hr-portal {
            border-color: #444444 !important;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
    </style>

    {{-- ================================================= --}}
    {{-- HTML BLADE (Portal Akses Hukum - Dark Mode)       --}}
    {{-- ================================================= --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5 card-dark-justice">
                    <div class="card-body p-0">
                        <div class="row">

                            <div class="col-lg-6 d-none d-lg-block bg-garuda-timbangan">

                                <i class="fas fa-balance-scale large-justice-icon"></i>

                                <h1 class="h4 text-portal-title text-center" style="color: var(--color-secondary) !important;">
                                    PORTAL
                                    <span style="color: var(--color-primary) !important; display: block;">AKSES HUKUM</span>
                                </h1>
                            </div>

                            <div class="col-lg-6 bg-dark-form">
                                <div class="p-5">

                                    <div class="text-center mb-5">
                                        <h1 class="h4 text-portal-title">MASUK</h1>
                                        <p class="text-portal-desc">
                                            Masuk untuk mengakses database kasus dan dokumen legal.
                                        </p>
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
                                            <i class="fas fa-user icon-inside-input"></i>
                                            <input type="email" class="form-control form-control-user form-control-dark" id="email" name="email"
                                                aria-describedby="emailHelp" placeholder="Email atau Nomor Lisensi..." autofocus>
                                        </div>

                                        <div class="form-group icon-input-wrapper">
                                            <i class="fas fa-lock icon-inside-input"></i>
                                            <input type="password" class="form-control form-control-user form-control-dark" id="password" name="password"
                                                placeholder="Kata Sandi Akses">
                                        </div>

                                        <div class="form-group mb-4">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label text-footer-link" for="customCheck">Ingat Saya</label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-portal-red btn-user btn-block">
                                            MASUK KE PORTAL
                                        </button>
                                    </form>

                                    <hr class="hr-portal">

                                    <div class="text-center">
                                        <a class="small text-footer-link" href="#">Lupa Kata Sandi?</a>
                                    </div>
                                    <div class="text-center mt-2">
                                        <a class="small text-footer-link" href="{{ url('/register') }}">Registrasi Akun Advokat/Klien Baru</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
