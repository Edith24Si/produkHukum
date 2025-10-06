<!DOCTYPE html>
<html>
<head>
    <title>Struktur Produk Hukum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="mb-3 container">
    <h3 class="mt-3">Struktur Produk Hukum</h3>

    <table class="table table-bordered table-striped">
        <thead class="table-primary text-center">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nomor</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Ringkasan</th>
                <th>Status</th>
                <th>Lampiran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produkHukum as $index => $item)
                <tr class="text-center">
                    <td>{{ $index + 1 }}</td>
                    
                    {{-- Foto --}}
                    <td>
                        <img src="{{ asset('images/'.$item['foto']) }}"
                             alt="Foto {{ $item['judul'] }}"
                             class="img-thumbnail"
                             style="width:80px; height:100px; object-fit:cover;">
                    </td>

                    {{-- Data utama --}}
                    <td>{{ $item['nomor'] }}</td>
                    <td>{{ $item['judul'] }}</td>
                    <td>{{ $item['tanggal'] }}</td>
                    <td>{{ $item['ringkasan'] }}</td>
                    <td>
                        <span class="badge {{ $item['status'] == 'Aktif' ? 'bg-success' : 'bg-warning' }}">
                            {{ $item['status'] }}
                        </span>
                    </td>

                    {{-- File Lampiran --}}
                    <td>
                        <a href="{{ asset('dokumen_hukum/'.$item['file']) }}" 
                           target="_blank" 
                           class="btn btn-sm btn-primary">
                            Lihat File
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

