{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal REGULASI DESA - Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --color-bg-main: #1e0e0e;
            --color-bg-card: #430202;
            --color-primary: #B71C1C;
            --color-secondary: #FFD700;
            --color-text: #E0E0E0;
        }

        body {
            background-color: var(--color-bg-main) !important;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            max-width: 1200px;
            width: 100%;
        }

        .card-login {
            border: none !important;
            border-radius: 1rem !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.7) !important;
            overflow: hidden;
            background-color: var(--color-bg-card);
            color: var(--color-text);
        }

        .left-panel {
            background: linear-gradient(135deg, #000000 0%, #2a0a0a 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem;
        }

        .logo-large {
            max-width: 180px;
            margin-bottom: 2rem;
            filter: drop-shadow(0 0 10px rgba(255, 215, 0, 0.3));
        }

        .portal-title {
            color: var(--color-primary) !important;
            font-size: 2.5rem;
            font-weight: 900;
            text-transform: uppercase;
            line-height: 1.2;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .portal-subtitle {
            color: var(--color-secondary);
            font-size: 1.2rem;
            text-align: center;
            font-weight: 300;
        }

        .right-panel {
            padding: 3rem;
        }

        .logo-small {
            max-height: 50px;
            margin-bottom: 1.5rem;
        }

        .login-title {
            color: var(--color-primary);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .login-subtitle {
            color: var(--color-text);
            font-size: 1rem;
            margin-bottom: 2rem;
            opacity: 0.8;
        }

        .form-group-custom {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--color-primary);
            font-size: 1.2rem;
            z-index: 10;
        }

        .form-control-custom {
            background-color: rgba(49, 49, 49, 0.8) !important;
            color: var(--color-text) !important;
            border: 1px solid #505050 !important;
            border-radius: 0.5rem !important;
            padding: 0.875rem 1rem 0.875rem 3.5rem !important;
            height: auto;
            width: 100%;
            transition: all 0.3s;
        }

        .form-control-custom:focus {
            box-shadow: 0 0 0 0.25rem rgba(183, 28, 28, 0.25) !important;
            border-color: var(--color-primary) !important;
            background-color: rgba(49, 49, 49, 1) !important;
        }

        .form-control-custom::placeholder {
            color: #A0A0A0 !important;
            font-style: italic;
        }

        .btn-login {
            background-color: var(--color-primary) !important;
            border: none !important;
            color: white !important;
            font-weight: 700 !important;
            font-size: 1.1rem;
            padding: 0.875rem 1rem !important;
            border-radius: 0.5rem !important;
            text-transform: uppercase;
            letter-spacing: 1px;
            width: 100%;
            transition: all 0.3s;
            margin-top: 1rem;
        }

        .btn-login:hover {
            background-color: #D32F2F !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(183, 28, 28, 0.3);
        }

        .checkbox-custom {
            margin-top: 1rem;
        }

        .checkbox-custom .form-check-input:checked {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
        }

        .checkbox-custom .form-check-label {
            color: var(--color-text);
        }

        .divider {
            border-color: rgba(255, 255, 255, 0.1) !important;
            margin: 2rem 0;
        }

        .footer-link {
            color: var(--color-text) !important;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .footer-link:hover {
            color: var(--color-primary) !important;
        }

        .alert-custom {
            background-color: rgba(183, 28, 28, 0.1);
            border: 1px solid var(--color-primary);
            color: var(--color-text);
            border-radius: 0.5rem;
        }

        @media (max-width: 992px) {
            .left-panel {
                padding: 2rem;
                border-radius: 1rem 1rem 0 0 !important;
            }

            .right-panel {
                padding: 2rem;
            }

            .portal-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card card-login">
            <div class="row g-0">
                <!-- Panel Kiri: Logo & Branding -->
                <div class="col-lg-6 d-none d-lg-block left-panel">
                    <img src="{{ asset('images/logo-produk-hukum.jpg') }}"
                         alt="Portal REGULASI DESA"
                         class="logo-large">

                    <h1 class="portal-title">
                        PORTAL<br>
                        <span style="color: var(--color-secondary);">REGULASI DESA</span>
                    </h1>

                    <p class="portal-subtitle mt-3">
                        Sistem Manajemen Dokumen Hukum Digital<br>
                        <span style="font-size: 0.9rem; opacity: 0.7;">versi 2.0</span>
                    </p>

                    <div class="mt-4 text-center" style="opacity: 0.7;">
                        <small>
                            <i class="fas fa-shield-alt me-1"></i>
                            Terenkripsi & Terproteksi
                        </small>
                    </div>
                </div>

                <!-- Panel Kanan: Form Login -->
                <div class="col-lg-6 right-panel">
                    <div class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('images/logo-produk-hukum.jpg') }}"
                             alt="Logo"
                             class="logo-small">
                    </div>

                    <h2 class="login-title text-center">MASUK</h2>
                    <p class="login-subtitle text-center">
                        Masuk untuk mengakses database kasus dan dokumen legal.
                    </p>

                    <!-- Alert Messages -->
                    @if ($errors->any())
                        <div class="alert alert-custom alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Login gagal!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('auth.login.post') }}">
                        @csrf

                        <!-- Email Field -->
                        <div class="form-group-custom">
                            <i class="fas fa-user form-icon"></i>
                            <input type="email"
                                   class="form-control form-control-custom"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="Email atau Nomor Lisensi..."
                                   required
                                   autofocus>
                        </div>

                        <!-- Password Field -->
                        <div class="form-group-custom">
                            <i class="fas fa-lock form-icon"></i>
                            <input type="password"
                                   class="form-control form-control-custom"
                                   id="password"
                                   name="password"
                                   placeholder="Kata Sandi Akses"
                                   required>
                        </div>

                        <!-- Remember Me -->
                        <div class="checkbox-custom">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="remember"
                                       id="remember">
                                <label class="form-check-label" for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-login">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            MASUK KE PORTAL
                        </button>
                    </form>

                    <hr class="divider">

                    <!-- Links -->
                    <div class="text-center">
                        <a href="#" class="footer-link d-block mb-2">
                            <i class="fas fa-key me-1"></i>
                            Lupa Kata Sandi?
                        </a>
                        <a href="{{ route('register') }}" class="footer-link">
                            <i class="fas fa-user-plus me-1"></i>
                            Registrasi Akun Advokat/Klien Baru
                        </a>
                    </div>

                    <div class="text-center mt-4" style="opacity: 0.6; font-size: 0.85rem;">
                        <i class="fas fa-info-circle me-1"></i>
                        Untuk bantuan teknis, hubungi: admin@hukum.com
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Auto focus email field
        document.addEventListener('DOMContentLoaded', function() {
            const emailField = document.getElementById('email');
            if (emailField) {
                emailField.focus();
            }

            // Clear alert after 5 seconds
            setTimeout(() => {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });
    </script>
</body>
</html>{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Regulasi Desa - Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --color-bg-main: #1e0e0e;
            --color-bg-card: #430202;
            --color-primary: #B71C1C;
            --color-secondary: #FFD700;
            --color-text: #E0E0E0;
        }

        body {
            background-color: var(--color-bg-main) !important;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            max-width: 1200px;
            width: 100%;
        }

        .card-login {
            border: none !important;
            border-radius: 1rem !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.7) !important;
            overflow: hidden;
            background-color: var(--color-bg-card);
            color: var(--color-text);
        }

        .left-panel {
            background: linear-gradient(135deg, #000000 0%, #2a0a0a 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem;
        }

        .logo-large {
            max-width: 180px;
            margin-bottom: 2rem;
            filter: drop-shadow(0 0 10px rgba(255, 215, 0, 0.3));
        }

        .portal-title {
            color: var(--color-primary) !important;
            font-size: 2.5rem;
            font-weight: 900;
            text-transform: uppercase;
            line-height: 1.2;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .portal-subtitle {
            color: var(--color-secondary);
            font-size: 1.2rem;
            text-align: center;
            font-weight: 300;
        }

        .right-panel {
            padding: 3rem;
        }

        .logo-small {
            max-height: 50px;
            margin-bottom: 1.5rem;
        }

        .login-title {
            color: var(--color-primary);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .login-subtitle {
            color: var(--color-text);
            font-size: 1rem;
            margin-bottom: 2rem;
            opacity: 0.8;
        }

        .form-group-custom {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--color-primary);
            font-size: 1.2rem;
            z-index: 10;
        }

        .form-control-custom {
            background-color: rgba(49, 49, 49, 0.8) !important;
            color: var(--color-text) !important;
            border: 1px solid #505050 !important;
            border-radius: 0.5rem !important;
            padding: 0.875rem 1rem 0.875rem 3.5rem !important;
            height: auto;
            width: 100%;
            transition: all 0.3s;
        }

        .form-control-custom:focus {
            box-shadow: 0 0 0 0.25rem rgba(183, 28, 28, 0.25) !important;
            border-color: var(--color-primary) !important;
            background-color: rgba(49, 49, 49, 1) !important;
        }

        .form-control-custom::placeholder {
            color: #A0A0A0 !important;
            font-style: italic;
        }

        .btn-login {
            background-color: var(--color-primary) !important;
            border: none !important;
            color: white !important;
            font-weight: 700 !important;
            font-size: 1.1rem;
            padding: 0.875rem 1rem !important;
            border-radius: 0.5rem !important;
            text-transform: uppercase;
            letter-spacing: 1px;
            width: 100%;
            transition: all 0.3s;
            margin-top: 1rem;
        }

        .btn-login:hover {
            background-color: #D32F2F !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(183, 28, 28, 0.3);
        }

        .checkbox-custom {
            margin-top: 1rem;
        }

        .checkbox-custom .form-check-input:checked {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
        }

        .checkbox-custom .form-check-label {
            color: var(--color-text);
        }

        .divider {
            border-color: rgba(255, 255, 255, 0.1) !important;
            margin: 2rem 0;
        }

        .footer-link {
            color: var(--color-text) !important;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .footer-link:hover {
            color: var(--color-primary) !important;
        }

        .alert-custom {
            background-color: rgba(183, 28, 28, 0.1);
            border: 1px solid var(--color-primary);
            color: var(--color-text);
            border-radius: 0.5rem;
        }

        @media (max-width: 992px) {
            .left-panel {
                padding: 2rem;
                border-radius: 1rem 1rem 0 0 !important;
            }

            .right-panel {
                padding: 2rem;
            }

            .portal-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card card-login">
            <div class="row g-0">
                <!-- Panel Kiri: Logo & Branding -->
                <div class="col-lg-6 d-none d-lg-block left-panel">
                    <img src="{{ asset('images/logo-produk-hukum.jpg') }}"
                         alt="Portal REGULASI DESA"
                         class="logo-large">

                    <h1 class="portal-title">
                        PORTAL<br>
                        <span style="color: var(--color-secondary);">REGULASI DESA</span>
                    </h1>

                    <p class="portal-subtitle mt-3">
                        Sistem Manajemen Dokumen Hukum Digital<br>
                        <span style="font-size: 0.9rem; opacity: 0.7;">versi 2.0</span>
                    </p>

                    <div class="mt-4 text-center" style="opacity: 0.7;">
                        <small>
                            <i class="fas fa-shield-alt me-1"></i>
                            Terenkripsi & Terproteksi
                        </small>
                    </div>
                </div>

                <!-- Panel Kanan: Form Login -->
                <div class="col-lg-6 right-panel">
                    <div class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('images/logo-produk-hukum.jpg') }}"
                             alt="Logo"
                             class="logo-small">
                    </div>

                    <h2 class="login-title text-center">MASUK</h2>
                    <p class="login-subtitle text-center">
                        Masuk untuk mengakses database kasus dan dokumen legal.
                    </p>

                    <!-- Alert Messages -->
                    @if ($errors->any())
                        <div class="alert alert-custom alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Login gagal!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('auth.login.post') }}">
                        @csrf

                        <!-- Email Field -->
                        <div class="form-group-custom">
                            <i class="fas fa-user form-icon"></i>
                            <input type="email"
                                   class="form-control form-control-custom"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="Email atau Nomor Lisensi..."
                                   required
                                   autofocus>
                        </div>

                        <!-- Password Field -->
                        <div class="form-group-custom">
                            <i class="fas fa-lock form-icon"></i>
                            <input type="password"
                                   class="form-control form-control-custom"
                                   id="password"
                                   name="password"
                                   placeholder="Kata Sandi Akses"
                                   required>
                        </div>

                        <!-- Remember Me -->
                        <div class="checkbox-custom">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="remember"
                                       id="remember">
                                <label class="form-check-label" for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-login">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            MASUK KE PORTAL
                        </button>
                    </form>

                    <hr class="divider">

                    <!-- Links -->
                    <div class="text-center">
                        <a href="#" class="footer-link d-block mb-2">
                            <i class="fas fa-key me-1"></i>
                            Lupa Kata Sandi?
                        </a>
                        <a href="{{ route('register') }}" class="footer-link">
                            <i class="fas fa-user-plus me-1"></i>
                            Registrasi Akun Advokat/Klien Baru
                        </a>
                    </div>

                    <div class="text-center mt-4" style="opacity: 0.6; font-size: 0.85rem;">
                        <i class="fas fa-info-circle me-1"></i>
                        Untuk bantuan teknis, hubungi: admin@hukum.com
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Auto focus email field
        document.addEventListener('DOMContentLoaded', function() {
            const emailField = document.getElementById('email');
            if (emailField) {
                emailField.focus();
            }

            // Clear alert after 5 seconds
            setTimeout(() => {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });
    </script>
</body>
</html>
