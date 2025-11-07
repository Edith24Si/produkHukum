<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Berhasil</title>

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

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.3);
            width: 400px;
        }

        h3 {
            color: #3E97FF;
            margin-bottom: 10px;
        }

        p {
            color: #333;
            font-size: 16px;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            background-color: #3E97FF;
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #2b7fe0;
        }

        .btn-secondary {
            background-color: #aaa;
        }

        .btn-secondary:hover {
            background-color: #888;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
    </style>
</head>
<body>

    <div class="card">
        <h3>Login Berhasil!</h3>
        <p>Selamat datang nona, <strong>{{ session('username') }}</strong> 👋</p>

        <div class="btn-container">
            <a href="{{ route('produkHukum.index') }}" class="btn">Masuk Dashboard</a>
            <a href="{{ route('auth.logout') }}" class="btn btn-secondary">Logout</a>
        </div>
    </div>

</body>
</html>