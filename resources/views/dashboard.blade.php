@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Welcome Banner -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-banner p-4 rounded" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h2 class="mb-2">Selamat Datang, Admin Hukum! 👋</h2>
                        <p class="mb-0">Sistem manajemen produk hukum terintegrasi untuk pengelolaan dokumen legal yang efisien dan transparan.</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <button class="btn btn-light btn-lg">
                            <i class="fas fa-plus me-2"></i> Tambah Dokumen
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card total-documents">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-icon documents mb-3">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <h6 class="text-muted mb-2">TOTAL DOKUMEN</h6>
                            <h2 class="mb-0">{{ $totalDokumen ?? 0 }}</h2>
                            <div class="mt-2">
                                <span class="text-success">
                                    <i class="fas fa-arrow-up"></i> +12%
                                </span>
                                <small class="text-muted"> dari bulan lalu</small>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('produkHukum.index') }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card categories">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-icon categories mb-3">
                                <i class="fas fa-folder"></i>
                            </div>
                            <h6 class="text-muted mb-2">KATEGORI</h6>
                            <h2 class="mb-0">{{ $totalKategori ?? 0 }}</h2>
                            <div class="mt-2">
                                <small class="text-muted">Kategori aktif</small>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('kategori_dokumen.index') }}" class="btn btn-sm btn-outline-success">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card types">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-icon types mb-3">
                                <i class="fas fa-tags"></i>
                            </div>
                            <h6 class="text-muted mb-2">JENIS DOKUMEN</h6>
                            <h2 class="mb-0">{{ $totalJenis ?? 0 }}</h2>
                            <div class="mt-2">
                                <small class="text-muted">Jenis tersedia</small>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('jenis_dokumen.index') }}" class="btn btn-sm btn-outline-info">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card users">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-icon users mb-3">
                                <i class="fas fa-users"></i>
                            </div>
                            <h6 class="text-muted mb-2">PENGGUNA AKTIF</h6>
                            <h2 class="mb-0">{{ $totalUsers ?? 0 }}</h2>
                            <div class="mt-2">
                                <small class="text-muted">User terdaftar</small>
                            </div>
                        </div>
                        <div>
                            <a href="#" class="btn btn-sm btn-outline-warning">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
        <div class="col-xl-8">
            <div class="chart-container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="mb-0">📈 Tren Dokumen (6 Bulan Terakhir)</h5>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-secondary active">Bulanan</button>
                        <button class="btn btn-sm btn-outline-secondary">Tahunan</button>
                    </div>
                </div>
                <div style="height: 300px;">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="chart-container">
                <h5 class="mb-4">📊 Distribusi Kategori</h5>
                <div style="height: 300px;">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted mb-3">
                        <i class="fas fa-file-contract text-primary me-2"></i> PERATURAN DESA
                    </h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">
                            {{ \App\Models\Dokumen::whereHas('jenisDokumen', function($q) {
                                $q->where('nama_jenis', 'like', '%Peraturan Desa%');
                            })->count() }}
                        </h3>
                        <span class="badge bg-primary">Aktif</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted mb-3">
                        <i class="fas fa-file-signature text-success me-2"></i> PERKADES
                    </h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">
                            {{ \App\Models\Dokumen::whereHas('jenisDokumen', function($q) {
                                $q->where('nama_jenis', 'like', '%Peraturan Kepala Desa%');
                            })->count() }}
                        </h3>
                        <span class="badge bg-success">Aktif</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted mb-3">
                        <i class="fas fa-file-invoice text-info me-2"></i> SURAT EDARAN
                    </h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">
                            {{ \App\Models\Dokumen::whereHas('jenisDokumen', function($q) {
                                $q->where('nama_jenis', 'like', '%Surat Edaran%');
                            })->count() }}
                        </h3>
                        <span class="badge bg-info">Aktif</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Documents Table -->
    <div class="row">
        <div class="col-12">
            <div class="data-table">
                <div class="card-body p-0">
                    <div class="table-header p-4 border-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-0">🗃️ Dokumen Terbaru</h5>
                                <small class="text-muted">Dokumen yang baru ditambahkan</small>
                            </div>
                            <div>
                                <a href="{{ route('produkHukum.create') }}" class="btn btn-primary me-2">
                                    <i class="fas fa-plus me-2"></i> Tambah Baru
                                </a>
                                <a href="{{ route('produkHukum.index') }}" class="btn btn-outline-primary">
                                    Lihat Semua <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="35%">Judul Dokumen</th>
                                    <th width="15%">Nomor</th>
                                    <th width="15%">Tahun</th>
                                    <th width="15%">Status</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $recentDocs = \App\Models\Dokumen::with('jenisDokumen')
                                        ->latest()
                                        ->limit(5)
                                        ->get();
                                @endphp

                                @forelse($recentDocs as $index => $doc)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="doc-icon me-3">
                                                <i class="fas fa-file-pdf text-danger"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ Str::limit($doc->judul, 50) }}</div>
                                                <small class="text-muted">{{ $doc->jenisDokumen->nama_jenis ?? '-' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $doc->nomor ?? '-' }}</td>
                                    <td>{{ $doc->tahun ?? '-' }}</td>
                                    <td>
                                        @if($doc->status == 'Berlaku')
                                            <span class="badge bg-success">Berlaku</span>
                                        @else
                                            <span class="badge bg-warning">Tidak Berlaku</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('produkHukum.show', $doc->dokumen_id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('produkHukum.edit', $doc->dokumen_id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">Belum ada dokumen</p>
                                        <a href="{{ route('produkHukum.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus me-2"></i> Tambah Dokumen Pertama
                                        </a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Line Chart
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Jumlah Dokumen',
                    data: [850, 920, 980, 1050, 1150, {{ $totalDokumen ?? 1230 }}],
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    borderWidth: 3,
                    pointBackgroundColor: '#667eea',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleFont: {
                            size: 13
                        },
                        bodyFont: {
                            size: 13
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false,
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            stepSize: 200,
                            font: {
                                size: 11
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 11
                            }
                        }
                    }
                }
            }
        });

        // Pie Chart
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Peraturan Desa', 'Peraturan Kepala Desa', 'Keputusan', 'Surat Edaran', 'Lainnya'],
                datasets: [{
                    data: [35, 25, 20, 15, 5],
                    backgroundColor: [
                        '#667eea',
                        '#764ba2',
                        '#f093fb',
                        '#f5576c',
                        '#4facfe'
                    ],
                    borderWidth: 0,
                    hoverOffset: 20
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            font: {
                                size: 11
                            },
                            padding: 15,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    }
                },
                cutout: '60%'
            }
        });

        // Update time in footer
        function updateTime() {
            const now = new Date();
            const timeElement = document.querySelector('.dashboard-footer small');
            if (timeElement) {
                timeElement.textContent = `v1.0.0 | Terakhir diperbarui: ${now.toLocaleDateString('id-ID')} ${now.toLocaleTimeString('id-ID')}`;
            }
        }

        // Update time every minute
        updateTime();
        setInterval(updateTime, 60000);
    });
</script>
@endsection
