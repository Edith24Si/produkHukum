<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berhasil Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5 text-center">
    <h1>{{ session('success') }}</h1>
    <a href="{{ route('login.form') }}" class="btn btn-secondary mt-3">Kembali ke Login</a>
</body>
</html>
