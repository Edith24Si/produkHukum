@extends('layouts.auth.app')

@section('content')
    <style>
        /* Variabel Warna Dark Mode Hukum */
        :root {
            --color-bg-main: #1e0e0e;
            --color-bg-card: #430202;
            --color-primary: #B71C1C;
            --color-secondary: #FFD700;
            --color-text: #E0E0E0;
        }

        /* Latar Belakang Body */
        body {
            background-color: var(--color-bg-main) !important;
        }

        /* Kartu Login Keseluruhan */
        .card-dark-justice {
            border: none !important;
            border-radius: 0.8rem !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.7) !important;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
            background-color: var(--color-bg-card);
        }

        /* Latar Belakang Kolom Formulir (Kanan) */
        .bg-dark-form {
            background-color: var(--color-bg-card);
            color: var(--color-text);
        }

        /* Kolom Kiri (Visual) - Kontainer Logo Emas */
        .bg-garuda-timbangan {
            position: relative;
            background-color: #000000;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 3rem;
            border-radius: 0.8rem 0 0 0.8rem;
        }

        /* Judul Utama */
        .h4.text-portal-title {
            color: var(--color-primary) !important;
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
            box-shadow: 0 0 0 0.2rem rgba(183, 28, 28, 0.5) !important;
            border-color: var(--color-primary) !important;
        }

        /* Icon Styling */
        .icon-input-wrapper {
            position: relative;
        }

        .icon-inside-input {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: var(--color-primary);
            font-size: 1.4rem;
            z-index: 10;
        }

        /* Tombol Login */
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

        /* Logo styling */
        .logo-panel-kiri {
            max-width: 200px;
            margin-bottom: 20px;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5 card-dark-justice">
                    <div class="card-body p-0">
                        <div class="row">
                            {{-- PANEL KIRI: LOGO BESAR / SLOGAN --}}
                            <div class="col-lg-6 d-none d-lg-block bg-garuda-timbangan text-center">
                                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <img src="{{ asset('images/logo-produk-hukum.jpg') }}" alt="Logo Akses Hukum"
                                        class="logo-panel-kiri" style="max-width: 100px; margin-bottom: 20px;">

                                    <h1 class="h4 text-portal-title">
                                        <span style="display: block;">PORTAL</span>
                                        <span style="color: var(--color-primary) !important; display: block;">
                                            AKSES HUKUM
                                        </span>
                                    </h1>
                                </div>
                            </div>

                            {{-- PANEL KANAN: FORM LOGIN --}}
                            <div class="col-lg-6 bg-dark-form">
                                <div class="p-5">
                                    <div class="text-center mb-5">
                                        <img src="{{ asset('images/logo-produk-hukum.jpg') }}" alt="Logo Akses Hukum"
                                            style="max-height: 35px; margin-bottom: 20px;">

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

                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <form class="user" action="{{ route('auth.login.post') }}" method="POST">
                                            @csrf

                                            <div class="form-group icon-input-wrapper mb-4">
                                                <i class="fas fa-user icon-inside-input"></i>
                                                <input type="email"
                                                    class="form-control form-control-user form-control-dark" id="email"
                                                    name="email" aria-describedby="emailHelp"
                                                    placeholder="Email atau Nomor Lisensi..." autofocus
                                                    value="{{ old('email') }}">
                                            </div>

                                            <div class="form-group icon-input-wrapper mb-4">
                                                <i class="fas fa-lock icon-inside-input"></i>
                                                <input type="password"
                                                    class="form-control form-control-user form-control-dark" id="password"
                                                    name="password" placeholder="Kata Sandi Akses">
                                            </div>

                                            <div class="form-group mb-4">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck"
                                                        name="remember">
                                                    <label class="custom-control-label text-footer-link"
                                                        for="customCheck">Ingat Saya</label>
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
                                            <a class="small text-footer-link" href="{{ route('register') }}">Registrasi Akun
                                                Advokat/Klien Baru</a>
                                        </div>
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
