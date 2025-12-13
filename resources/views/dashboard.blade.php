{{-- resources/views/dashboard/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Welcome Card -->
    <div class="welcome-card mb-4">
        <div class="welcome-content">
            <h1 class="welcome-title">Selamat Datang, {{ auth()->user()->name }}!</h1>
            <p class="welcome-subtitle">
                Anda login sebagai <strong class="text-warning">{{ ucfirst(auth()->user()->role) }}</strong> dengan akses
                penuh untuk mengelola sistem Portal Produk Hukum.
            </p>
            <div class="admin-badge">
                <i class="fas fa-user-shield me-2"></i> Portal Pengelolaan Hukum Daerah
            </div>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="row mb-4">
        <!-- Total Dokumen -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="quick-stat-card" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                <div class="stat-icon">
                    <i class="fas fa-file-contract"></i>
                </div>
                <div class="stat-number">{{ \App\Models\ProdukHukum::count() ?? 0 }}</div>
                <div class="stat-label">PRODUK HUKUM</div>
            </div>
        </div>

        <!-- Jenis Dokumen -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="quick-stat-card" style="background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);">
                <div class="stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-number">{{ \App\Models\JenisDokumen::count() ?? 0 }}</div>
                <div class="stat-label">JENIS DOKUMEN</div>
            </div>
        </div>

        <!-- Kategori Dokumen -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="quick-stat-card" style="background: linear-gradient(135deg, #36b9cc 0%, #258391 100%);">
                <div class="stat-icon">
                    <i class="fas fa-folder"></i>
                </div>
                <div class="stat-number">{{ \App\Models\KategoriDokumen::count() ?? 0 }}</div>
                <div class="stat-label">KATEGORI</div>
            </div>
        </div>

        <!-- Total User (INILAH CARD USER) -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="quick-stat-card" style="background: linear-gradient(135deg, #f6c23e 0%, #dda20a 100%);">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number">{{ \App\Models\User::count() }}</div>
                <div class="stat-label">TOTAL USER</div>
                <div class="stat-detail mt-2">
                    <small class="text-light">
                        Admin: {{ \App\Models\User::where('role', 'admin')->count() }} |
                        User: {{ \App\Models\User::where('role', 'user')->count() }}
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Statistics -->
    <div class="row mb-4">
        <!-- Dokumen Hukum -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-primary text-white py-3">
                    <h6 class="mb-0 font-weight-bold">
                        <i class="fas fa-gavel me-2"></i>Dokumen Hukum
                    </h6>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="h2 font-weight-bold text-dark mb-1">{{ \App\Models\ProdukHukum::count() ?? 0 }}</div>
                        <div class="text-muted small">Total Produk Hukum</div>
                        <div class="mt-3">
                            <span class="badge bg-success">
                                <i class="fas fa-database me-1"></i>
                                Data Aktif
                            </span>
                        </div>
                    </div>
                    <div class="display-4 text-primary opacity-25">
                        <i class="fas fa-file-contract"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Warga -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-success text-white py-3">
                    <h6 class="mb-0 font-weight-bold">
                        <i class="fas fa-users me-2"></i>Data Warga
                    </h6>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        @php
                            $totalWarga = \App\Models\Warga::count() ?? 0;
                        @endphp
                        <div class="h2 font-weight-bold text-dark mb-1">{{ $totalWarga }}</div>
                        <div class="text-muted small">Warga Terdaftar</div>
                        <div class="mt-3">
                            @if ($totalWarga > 0)
                                <span class="badge bg-info">
                                    <i class="fas fa-check-circle me-1"></i>
                                    Data Tersedia
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    <i class="fas fa-exclamation-circle me-1"></i>
                                    Belum Ada Data
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="display-4 text-success opacity-25">
                        <i class="fas fa-user-friends"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengguna Sistem (USER DETAIL) -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-info text-white py-3">
                    <h6 class="mb-0 font-weight-bold">
                        <i class="fas fa-user-cog me-2"></i>Pengguna Sistem
                    </h6>
                </div>
                <div class="card-body">
                    <div class="h2 font-weight-bold text-dark mb-1">{{ \App\Models\User::count() }}</div>
                    <div class="text-muted small">Total User Aktif</div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="text-center">
                                <div class="h4 text-primary">{{ \App\Models\User::where('role', 'admin')->count() }}</div>
                                <small class="text-muted">Admin</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center">
                                <div class="h4 text-success">{{ \App\Models\User::where('role', 'user')->count() }}</div>
                                <small class="text-muted">User</small>
                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->role == 'admin')
                        <div class="mt-3">
                            <a href="{{ route('user.index') }}" class="btn btn-sm btn-info w-100">
                                <i class="fas fa-users-cog me-1"></i> Kelola User
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Klasifikasi Dokumen -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-warning text-dark py-3">
                    <h6 class="mb-0 font-weight-bold">
                        <i class="fas fa-tags me-2"></i>Klasifikasi Dokumen
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 mb-3">
                            <div class="h3 font-weight-bold text-dark">{{ \App\Models\JenisDokumen::count() ?? 0 }}</div>
                            <div class="text-muted small">Jenis Dokumen</div>
                            <a href="{{ route('jenis_dokumen.index') }}" class="small text-primary">Lihat</a>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="h3 font-weight-bold text-dark">{{ \App\Models\KategoriDokumen::count() ?? 0 }}
                            </div>
                            <div class="text-muted small">Kategori</div>
                            <a href="{{ route('kategori_dokumen.index') }}" class="small text-success">Lihat</a>
                        </div>
                    </div>
                    @php
                        $totalClassification =
                            (\App\Models\JenisDokumen::count() ?? 0) + (\App\Models\KategoriDokumen::count() ?? 0);
                        $jenisPercentage =
                            $totalClassification > 0
                                ? ((\App\Models\JenisDokumen::count() ?? 0) / $totalClassification) * 100
                                : 0;
                        $kategoriPercentage =
                            $totalClassification > 0
                                ? ((\App\Models\KategoriDokumen::count() ?? 0) / $totalClassification) * 100
                                : 0;
                    @endphp
                    <div class="progress mt-2" style="height: 8px;">
                        <div class="progress-bar bg-primary" style="width: {{ $jenisPercentage }}%"></div>
                        <div class="progress-bar bg-success" style="width: {{ $kategoriPercentage }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Document Type Cards -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 font-weight-bold text-dark">
                        <i class="fas fa-chart-bar text-primary me-2"></i>
                        Statistik Jenis Dokumen
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @php
                            $jenisList = \App\Models\JenisDokumen::orderBy('id', 'desc')->limit(4)->get();
                        @endphp

                        @forelse($jenisList as $jenis)
                            <div class="col-xl-3 col-md-6 mb-3">
                                <div class="doc-type-card {{ $loop->iteration % 2 == 0 ? 'perkades' : 'perdes' }}">
                                    <div class="doc-type-number">{{ $jenis->produk_hukum_count ?? 0 }}</div>
                                    <div class="doc-type-label">{{ $jenis->nama_jenis ?? 'Jenis Dokumen' }}</div>
                                    <div class="mt-2">
                                        <small
                                            class="text-muted">{{ Str::limit($jenis->deskripsi ?? 'Deskripsi jenis', 50) }}</small>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-4">
                                <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada data jenis dokumen</p>
                                @if (auth()->user()->role == 'admin')
                                    <a href="{{ route('jenis_dokumen.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-1"></i> Tambah Jenis Dokumen
                                    </a>
                                @endif
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tables Section -->
    <div class="row">
        <!-- Dokumen Terbaru -->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold text-dark">
                        <i class="fas fa-file-alt text-primary me-2"></i>
                        Dokumen Terbaru
                    </h5>
                    <a href="{{ route('produkHukum.index') }}" class="btn btn-sm btn-outline-primary">
                        Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Judul</th>
                                    <th>Jenis</th>
                                    <th class="pe-4">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $dokumenTerbaru = \App\Models\ProdukHukum::with('jenisDokumen')
                                        ->latest()
                                        ->limit(5)
                                        ->get();
                                @endphp

                                @forelse($dokumenTerbaru as $dokumen)
                                    <tr>
                                        <td class="ps-4">
                                            <a href="{{ route('produkHukum.show', $dokumen->id) }}"
                                                class="text-decoration-none text-dark">
                                                <i class="fas fa-file-alt me-2 text-muted"></i>
                                                {{ Str::limit($dokumen->judul, 35) }}
                                            </a>
                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25">
                                                {{ $dokumen->jenisDokumen->nama_jenis ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="pe-4">
                                            <small class="text-muted">
                                                {{ $dokumen->created_at->format('d/m/Y') }}
                                            </small>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">
                                            <i class="fas fa-file-excel fa-2x mb-3"></i>
                                            <p class="mb-0">Belum ada dokumen</p>
                                            @if (auth()->user()->role == 'admin')
                                                <a href="{{ route('produkHukum.create') }}"
                                                    class="btn btn-primary btn-sm mt-2">
                                                    <i class="fas fa-plus me-1"></i> Tambah Dokumen
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Aktif Terbaru -->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold text-dark">
                        <i class="fas fa-users text-success me-2"></i>
                        User Aktif Terbaru
                    </h5>
                    @if (auth()->user()->role == 'admin')
                        <a href="{{ route('user.index') }}" class="btn btn-sm btn-outline-success">
                            Kelola User <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    @endif
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Nama</th>
                                    <th>Email</th>
                                    <th class="pe-4">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $userTerbaru = \App\Models\User::latest()->limit(5)->get();
                                @endphp

                                @forelse($userTerbaru as $user)
                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar-xs me-2">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </div>
                                                {{ $user->name }}
                                            </div>
                                        </td>
                                        <td>
                                            <small class="text-muted">{{ $user->email }}</small>
                                        </td>
                                        <td class="pe-4">
                                            <span class="badge bg-{{ $user->role == 'admin' ? 'primary' : 'success' }}">
                                                <i
                                                    class="fas fa-user-{{ $user->role == 'admin' ? 'shield' : 'circle' }} me-1"></i>
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">
                                            <i class="fas fa-user-slash fa-2x mb-3"></i>
                                            <p class="mb-0">Belum ada data user</p>
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

    <!-- Info Footer -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card border-0 bg-light">
                <div class="card-body text-center">
                    <h6 class="font-weight-bold mb-3">Portal Produk Hukum Daerah</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            <small>dokumen@daerah.hukum.id</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-phone text-success me-2"></i>
                            <small>📞 (021) 123-4567</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <i class="fas fa-at text-info me-2"></i>
                            <small>produkhukumdaerah@gmail.com</small>
                        </div>
                    </div>
                    <hr class="my-3">
                    <p class="small text-muted mb-0">
                        <i class="fas fa-copyright me-1"></i> {{ date('Y') }} Portal Produk Hukum Daerah.
                        Hak Cipta Dilindungi. Versi 2.0
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Custom styles for dashboard */
        .quick-stat-card {
            border-radius: 15px;
            padding: 1.5rem;
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            position: relative;
            overflow: hidden;
        }

        .quick-stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .quick-stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(45deg);
        }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .stat-label {
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .stat-detail {
            position: relative;
            z-index: 1;
            font-size: 0.8rem;
            opacity: 0.8;
        }

        .doc-type-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border-top: 4px solid;
            transition: all 0.3s;
            height: 100%;
        }

        .doc-type-card.perdes {
            border-top-color: #4e73df;
        }

        .doc-type-card.perkades {
            border-top-color: #1cc88a;
        }

        .doc-type-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .doc-type-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .doc-type-label {
            color: #666;
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .user-avatar-xs {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4e73df 0%, #2e59d9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.85rem;
        }
    </style>
@endpush
