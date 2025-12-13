<!DOCTYPE html>
<html lang="id" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Produk Hukum Desa">
    <meta name="author" content="Portal Hukum">

    <title>@yield('title', 'Portal Produk Hukum')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom Styles -->
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --success-color: #27ae60;
            --info-color: #17a2b8;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .dashboard-wrapper {
            background: rgba(255, 255, 255, 0.95);
            min-height: 100vh;
            border-radius: 0;
        }

        /* Sidebar Styles */
        .sidebar {
            background: linear-gradient(180deg, var(--primary-color) 0%, #1a252f 100%);
            color: white;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .sidebar .logo {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar .logo h4 {
            color: white;
            margin: 0;
            font-weight: 700;
        }

        .sidebar .logo span {
            color: #3498db;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .sidebar .nav-link i {
            width: 24px;
            margin-right: 10px;
            text-align: center;
        }

        .sidebar .user-info {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.2);
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 0;
        }

        /* Top Bar */
        .top-bar {
            background: white;
            padding: 15px 30px;
            border-bottom: 1px solid #e3e6f0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .top-bar .user-dropdown img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--secondary-color);
        }

        /* Card Styles */
        .stat-card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
            border-top: 4px solid;
            margin-bottom: 25px;
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .stat-card.total-documents { border-top-color: var(--secondary-color); }
        .stat-card.categories { border-top-color: var(--success-color); }
        .stat-card.types { border-top-color: var(--info-color); }
        .stat-card.users { border-top-color: var(--warning-color); }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .stat-icon.documents { background: rgba(52, 152, 219, 0.1); color: var(--secondary-color); }
        .stat-icon.categories { background: rgba(39, 174, 96, 0.1); color: var(--success-color); }
        .stat-icon.types { background: rgba(23, 162, 184, 0.1); color: var(--info-color); }
        .stat-icon.users { background: rgba(243, 156, 18, 0.1); color: var(--warning-color); }

        /* Chart Container */
        .chart-container {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        /* Table Styles */
        .data-table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .data-table .table thead {
            background: linear-gradient(90deg, var(--primary-color) 0%, #2c3e50 100%);
            color: white;
        }

        .data-table .table th {
            border: none;
            padding: 15px;
            font-weight: 600;
        }

        .data-table .table td {
            padding: 15px;
            vertical-align: middle;
            border-color: #f1f5f9;
        }

        .data-table .table tbody tr:hover {
            background-color: #f8fafc;
        }

        /* Badge */
        .badge {
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 500;
        }

        /* Footer */
        .dashboard-footer {
            background: var(--primary-color);
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .sidebar .logo h4 span,
            .sidebar .nav-link span,
            .sidebar .user-info .user-name {
                display: none;
            }

            .sidebar .nav-link {
                text-align: center;
                padding: 15px 5px;
                margin: 5px;
            }

            .sidebar .nav-link i {
                margin-right: 0;
                font-size: 20px;
            }

            .main-content {
                margin-left: 70px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Dashboard Container -->
    <div class="dashboard-wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="logo">
                <h4><i class="fas fa-gavel"></i> <span>PRODUK HUKUM</span></h4>
                <small class="text-muted">Portal Desa</small>
            </div>

            <div class="mt-4">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Menu Management Dokumen -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produkHukum.index') }}">
                            <i class="fas fa-file-alt"></i> <span>Dokumen Hukum</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lampiranDokumen.index') }}">
                            <i class="fas fa-paperclip"></i> <span>Lampiran</span>
                        </a>
                    </li>

                    <!-- Menu Master Data -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jenis_dokumen.index') }}">
                            <i class="fas fa-tags"></i> <span>Jenis Dokumen</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kategori_dokumen.index') }}">
                            <i class="fas fa-folder"></i> <span>Kategori</span>
                        </a>
                    </li>

                    <!-- Menu Pengaturan -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.show') }}">
                            <i class="fas fa-user"></i> <span>Profil Saya</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>

            <!-- User Info -->
            <div class="user-info">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-user-circle fa-2x"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <div class="user-name">Admin Hukum</div>
                        <small class="text-muted">Administrator</small>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Bar -->
            <div class="top-bar">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">@yield('title', 'Dashboard')</h5>
                        <small class="text-muted">{{ now()->format('d F Y') }}</small>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="dropdown">
                            <button class="btn btn-link text-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-2"></i>
                                <span>Admin Hukum</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="fas fa-user me-2"></i> Profil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="content-area p-4">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="dashboard-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h6><i class="fas fa-gavel"></i> PORTAL PRODUK HUKUM DESA</h6>
                            <p class="mb-0 small">Sistem Pengelolaan Regulasi & Dokumen Publik</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <p class="mb-0 small">
                                &copy; {{ date('Y') }} - Hak Cipta Dilindungi Undang-Undang<br>
                                <small>v1.0.0 | Terakhir diperbarui: {{ now()->format('d/m/Y H:i') }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Scripts -->
    @stack('scripts')
</body>
</html>
