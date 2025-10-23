@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Judul Halaman -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Produk Hukum</h1>
    </div>

    <!-- Row Statistik -->
    <div class="row">

        <!-- Dokumen Hukum -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2" style="border-left-color:#0b3d91 !important;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dokumen Hukum</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalDokumen }}</div>
                            <div class="text-xs {{ $persenDokumen >= 0 ? 'text-success' : 'text-danger' }}">
                                {{ $persenDokumen }}% {{ $persenDokumen >= 0 ? 'naik' : 'turun' }} bulan ini
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gavel fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kategori Dokumen -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2" style="border-left-color:#d4af37 !important;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Kategori Dokumen</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalKategori }}</div>
                            <div class="text-xs {{ $persenKategori >= 0 ? 'text-success' : 'text-danger' }}">
                                {{ $persenKategori }}% {{ $persenKategori >= 0 ? 'naik' : 'turun' }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jenis Dokumen -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2" style="border-left-color:#0b3d91 !important;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jenis Dokumen</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalJenis }}</div>
                            <div class="text-xs {{ $persenJenis >= 0 ? 'text-success' : 'text-danger' }}">
                                {{ $persenJenis }}% {{ $persenJenis >= 0 ? 'naik' : 'turun' }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lampiran Dokumen -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" style="border-left-color:#d4af37 !important;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Lampiran Dokumen</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLampiran }}</div>
                            <div class="text-xs {{ $persenLampiran >= 0 ? 'text-success' : 'text-danger' }}">
                                {{ $persenLampiran }}% {{ $persenLampiran >= 0 ? 'naik' : 'turun' }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paperclip fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Grafik Garis -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Tren Dokumen Hukum per Bulan</h6>
                </div>
                <div class="card-body">
                    <canvas id="chartLine"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartLine');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($bulan) !!},
        datasets: [{
            label: 'Jumlah Dokumen',
            data: {!! json_encode($jumlah) !!},
            borderColor: '#0b3d91',
            backgroundColor: 'rgba(11, 61, 145, 0.1)',
            pointBackgroundColor: '#d4af37',
            pointBorderColor: '#0b3d91',
            borderWidth: 2,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: { beginAtZero: true }
        }
    }
});
<canvas id="lineChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('lineChart');
new Chart(ctx, {
  type: 'line',
  data: {
    labels: @json($bulan),
    datasets: [{
      label: 'Jumlah Dokumen',
      data: @json($jumlah),
      borderColor: '#004aad',
      backgroundColor: 'rgba(0, 74, 173, 0.2)',
      fill: true,
      tension: 0.3
    }]
  },
  options: {
    plugins: {
      tooltip: {
        callbacks: {
          afterLabel: (ctx) => {
            const persen = @json($persen);
            return `(${persen[ctx.dataIndex]}%)`;
          }
        }
      }
    }
  }
});
</script>

</script>
@endsection
