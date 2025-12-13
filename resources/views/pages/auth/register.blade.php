<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Produk Hukum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --color-bg-main: #1e0e0e;
            --color-bg-card: #2a0f0f;
            --color-primary: #B71C1C;
            --color-secondary: #FFD700;
            --color-text: #E0E0E0;
        }

        body {
            background-color: var(--color-bg-main) !important;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .register-card {
            background-color: var(--color-bg-card);
            border-radius: 10px;
            border: 1px solid #444;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-container img {
            max-height: 80px;
        }

        .title {
            color: var(--color-primary);
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .subtitle {
            color: var(--color-text);
            opacity: 0.8;
            margin-bottom: 30px;
        }

        .form-control-custom {
            background-color: #333;
            border: 1px solid #555;
            color: var(--color-text);
            padding: 12px 15px;
        }

        .form-control-custom:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 0.2rem rgba(183, 28, 28, 0.25);
        }

        .btn-register {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
            color: white;
            font-weight: bold;
            padding: 12px;
            width: 100%;
            margin-top: 10px;
        }

        .btn-register:hover {
            background-color: #c62828;
            border-color: #c62828;
        }

        .login-link {
            color: var(--color-secondary);
            text-decoration: none;
        }

        .login-link:hover {
            color: #ffed4e;
        }

        .alert {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="register-card p-4 p-md-5">
                    <div class="logo-container">
                        @if(file_exists(public_path('public/images/logo-produk-hukum.jpg')))
                            <img src="{{ asset('public/images/logo-produk-hukum.jpg') }}"
                                 alt="Logo Sistem Produk Hukum">
                        @elseif(file_exists(public_path('images/logo-produk-hukum.jpg')))
                            <img src="{{ asset('images/logo-produk-hukum.jpg') }}"
                                 alt="Logo Sistem Produk Hukum">
                        @else
                            <div style="color: var(--color-primary); font-size: 2.5rem;">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                        @endif
                    </div>

                    <h2 class="title text-center">REGISTRASI AKUN BARU</h2>
                    <p class="subtitle text-center">Buat akun untuk mengakses sistem produk hukum</p>

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

                    <form method="POST" action="{{ route('register.process') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label text-light">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-custom"
                                   name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-light">Username</label>
                            <input type="text" class="form-control form-control-custom"
                                   name="username" value="{{ old('username') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-light">Email</label>
                            <input type="email" class="form-control form-control-custom"
                                   name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-light">Password</label>
                            <input type="password" class="form-control form-control-custom"
                                   name="password" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-light">Konfirmasi Password</label>
                            <input type="password" class="form-control form-control-custom"
                                   name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-register">
                            <i class="fas fa-user-plus me-2"></i> DAFTAR SEKARANG
                        </button>

                        <div class="text-center mt-4">
                            <p class="text-light mb-0">
                                Sudah punya akun?
                                <a href="{{ route('login') }}" class="login-link">Login di sini</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
