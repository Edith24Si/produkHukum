<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    {{-- [STYLE ANDA SAYA BIARKAN UTUH] --}}
    <style>
        body {
            background: url('/images/login.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #3E97FF;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .form-label {
            color: #000;
            font-weight: 500;
            text-align: left;
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
            background: rgba(255, 255, 255, 0.85);
            margin-bottom: 10px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #3E97FF;
            color: #fff;
            border: none;
            border-radius: 18px;
            padding: 10px;
            width: 100%;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #2b7fe0;
        }

        .register-link {
            display: block;
            margin-top: 15px;
            color: #3E97FF;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        .alert {
            background: #f8d7da;
            color: #842029;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            text-align: left;
            font-size: 14px;
        }

        .alert-success {
            background: #d1e7dd;
            color: #0f5132;
        }

        .error-text {
            color: #d93025;
            font-size: 13px;
            text-align: left;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login Admin</h2>

        {{-- Flash Message --}}
        @if(session('error'))
        <div class="alert">{{ session('error') }}</div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('auth.login.post') }}" method="POST">
            @csrf

            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}">
            @error('username')
            <div class="error-text">{{ $message }}</div>
            @enderror

            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
            @error('password')
            <div class="error-text">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn-primary">Login</button>

            {{-- PERBAIKAN 3: Menambahkan link ke halaman Register --}}
            <a href="{{ route('register') }}" class="register-link">
                Belum punya akun? Daftar di sini
            </a>
        </form>

    </div>

</body>

</html>