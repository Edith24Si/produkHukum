@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800 font-weight-bold">📊 Dashboard Statistik</h1>
        <span class="text-muted">Diperbarui: {{ now()->format('d M Y') }}</span>
    </div>

    <!-- Statistik Cards -->
    <div class="row">
        @php
            $cards = [
                ['title' => 'Total Dokumen', 'value' => 1230, 'change' => '+12%', 'color' => 'primary', 'icon' => 'fa-file-alt'],
                ['title' => 'Kategori', 'value' => 57, 'change' => '-4%', 'color' => 'success', 'icon' => 'fa-folder-open'],
                ['title' => 'Jenis Dokumen', 'value' => 32, 'change' => '+8%', 'color' => 'warning', 'icon' => 'fa-tags'],
                ['title' => 'Lampiran', 'value' => 204, 'change' => '+5%', 'color' => 'info', 'icon' => 'fa-paperclip']
            ];
        @endphp

        @foreach ($cards as $card)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-{{ $card['color'] }} shadow-sm h-100 py-2 hover-shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-{{ $card['color'] }} text-uppercase mb-1">{{ $card['title'] }}</div>
                        <div class="h5 font-weight-bold text-gray-800">{{ number_format($card['value']) }}</div>
                        <div class="small {{ str_contains($card['change'], '+') ? 'text-success' : 'text-danger' }}">
                            {{ $card['change'] }} dari bulan lalu
                        </div>
                    </div>
                    <i class="fas {{ $card['icon'] }} fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Grafik -->
    <div class="row">
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">📈 Tren Dokumen (6 Bulan Terakhir)</h6>
                </div>
                <div class="card-body">
                    <canvas id="lineChart" height="120"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-success">📂 Distribusi Kategori</h6>
                </div>
                <div class="card-body">
                    <canvas id="pieChart" height="120"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">🗃️ Data Terbaru</h6>
            <a href="#" class="btn btn-sm btn-primary">Lihat Semua</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Judul Dokumen</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td><td>Peraturan Desa No. 1 Tahun 2025</td><td>Peraturan</td>
                            <td>01 Okt 2025</td><td class="text-success">+15%</td>
                        </tr>
                        <tr>
                            <td>2</td><td>Keputusan Kepala Desa</td><td>Keputusan</td>
                            <td>15 Sep 2025</td><td class="text-danger">-5%</td>
                        </tr>
                        <tr>
                            <td>3</td><td>Surat Edaran Desa</td><td>Surat</td>
                            <td>12 Sep 2025</td><td class="text-success">+8%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {
    // Line Chart
    new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: ['Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'],
            datasets: [{
                label: 'Jumlah Dokumen',
                data: [900, 950, 1020, 1100, 1180, 1230],
                borderColor: '#4e73df',
                backgroundColor: 'rgba(78,115,223,0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    // Pie Chart
    new Chart(document.getElementById('pieChart'), {
        type: 'doughnut',
        data: {
            labels: ['Peraturan', 'Keputusan', 'Surat', 'Lainnya'],
            datasets: [{
                data: [40, 25, 20, 15],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e']
            }]
        },
        options: { cutout: '70%', plugins: { legend: { position: 'bottom' } } }
    });
});
</script>
@endsection
