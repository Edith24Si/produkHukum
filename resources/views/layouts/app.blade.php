<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Portal Hukum Desa</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #4e73df;
            --primary-dark: #2e59d9;
            --secondary: #858796;
            --success: #1cc88a;
            --info: #36b9cc;
            --warning: #f6c23e;
            --danger: #e74a3b;
            --dark: #5a5c69;
            --light: #f8f9fc;
            --sidebar-width: 280px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fb;
            color: #333;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        /* ===== SIDEBAR ===== */
        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            background: linear-gradient(180deg, #ffffff 0%, #f8f9fc 100%);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-right: 1px solid #e3e6f0;
        }

        .sidebar-header {
            padding: 1.5rem 1.5rem;
            border-bottom: 1px solid #e3e6f0;
            background: white;
        }

        .sidebar-header .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .logo-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.4rem;
            color: var(--primary);
        }

        .logo-subtext {
            font-size: 0.8rem;
            color: var(--secondary);
            margin-top: -3px;
        }

        /* Sidebar Menu */
        .sidebar-menu {
            padding: 1.5rem 0;
            height: calc(100vh - 120px);
            overflow-y: auto;
        }

        .nav-item {
            margin-bottom: 5px;
            padding: 0 1.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.85rem 1rem;
            color: #5a5c69;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .nav-link:hover {
            background-color: rgba(78, 115, 223, 0.1);
            color: var(--primary);
            transform: translateX(5px);
        }

        .nav-link.active {
            background: linear-gradient(90deg, rgba(78, 115, 223, 0.1) 0%, rgba(78, 115, 223, 0.05) 100%);
            color: var(--primary);
            border-left: 4px solid var(--primary);
        }

        .nav-link i {
            width: 24px;
            font-size: 1.1rem;
            margin-right: 12px;
        }

        .nav-link .arrow {
            margin-left: auto;
            transition: transform 0.3s;
        }

        .nav-link[aria-expanded="true"] .arrow {
            transform: rotate(180deg);
        }

        /* Submenu */
        .submenu {
            padding-left: 2.8rem;
            margin-top: 5px;
        }

        .submenu .nav-link {
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
            border-left: 2px solid #e3e6f0;
        }

        .submenu .nav-link.active {
            border-left-color: var(--primary);
        }

        /* User Profile in Sidebar */
        .user-profile-sidebar {
            padding: 1.5rem;
            border-top: 1px solid #e3e6f0;
            background: white;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1rem;
        }

        .user-details h6 {
            margin-bottom: 2px;
            font-size: 0.95rem;
        }

        .user-details .badge {
            font-size: 0.7rem;
            padding: 0.25rem 0.5rem;
        }

        /* ===== MAIN CONTENT ===== */
        #main-content {
            margin-left: var(--sidebar-width);
            padding: 0;
            transition: all 0.3s;
            min-height: 100vh;
        }

        /* Top Navbar */
        .top-navbar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
            position: sticky;
            top: 0;
            z-index: 999;
            border-bottom: 1px solid #e3e6f0;
        }

        .page-title h1 {
            font-size: 1.8rem;
            color: var(--dark);
            margin-bottom: 0;
        }

        .page-title .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 0;
        }

        .page-title .breadcrumb-item a {
            color: var(--secondary);
            text-decoration: none;
        }

        .page-title .breadcrumb-item.active {
            color: var(--primary);
        }

        .user-dropdown .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            background: rgba(78, 115, 223, 0.08);
            border: none;
            color: var(--primary);
            font-weight: 500;
        }

        .user-dropdown .dropdown-toggle:hover {
            background: rgba(78, 115, 223, 0.15);
        }

        /* ===== DASHBOARD CONTENT ===== */
        .dashboard-content {
            padding: 2rem;
        }

        /* Welcome Card */
        .welcome-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            color: white;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(45deg);
        }

        .welcome-content {
            position: relative;
            z-index: 1;
        }

        .welcome-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        welcome-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 1rem;
        }

        .admin-badge {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            display: inline-block;
            margin-top: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Quick Stats */
        .quick-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e3e6f0;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stat-icon.doc {
            background: linear-gradient(135deg, #4e73df 0%, #2e59d9 100%);
            color: white;
        }

        .stat-icon.warga {
            background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);
            color: white;
        }

        .stat-icon.user {
            background: linear-gradient(135deg, #36b9cc 0%, #258391 100%);
            color: white;
        }

        .stat-icon.category {
            background: linear-gradient(135deg, #f6c23e 0%, #dda20a 100%);
            color: white;
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .stat-label {
            color: var(--secondary);
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* Document Type Cards */
        .doc-type-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .doc-type-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border-top: 4px solid var(--primary);
            transition: all 0.3s;
        }

        .doc-type-card.perdes {
            border-top-color: #4e73df;
        }

        .doc-type-card.perkades {
            border-top-color: #1cc88a;
        }

        .doc-type-card.surat-edaran {
            border-top-color: #36b9cc;
        }

        .doc-type-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .doc-type-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .doc-type-label {
            color: var(--secondary);
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Charts Container */
        .charts-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .chart-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e3e6f0;
        }

        .chart-card .card-header {
            background: transparent;
            border: none;
            padding: 0 0 1rem 0;
            margin-bottom: 1rem;
        }

        .chart-card .card-title {
            font-size: 1.2rem;
            color: var(--dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .chart-card .card-subtitle {
            color: var(--secondary);
            font-size: 0.9rem;
        }

        /* Tables */
        .tables-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .table-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e3e6f0;
        }

        .table-card .card-header {
            background: linear-gradient(90deg, rgba(78, 115, 223, 0.1) 0%, rgba(78, 115, 223, 0.05) 100%);
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #e3e6f0;
        }

        .table-card .card-title {
            font-size: 1.1rem;
            color: var(--dark);
            font-weight: 600;
            margin-bottom: 0;
        }

        .table-card .table {
            margin-bottom: 0;
        }

        .table-card .table th {
            border-top: none;
            font-weight: 600;
            color: var(--secondary);
            background: #f8f9fc;
            padding: 1rem 1.5rem;
        }

        .table-card .table td {
            padding: 1rem 1.5rem;
            vertical-align: middle;
            border-color: #e3e6f0;
        }

        /* Footer */
        .footer {
            background: white;
            padding: 1.5rem 2rem;
            border-top: 1px solid #e3e6f0;
            margin-top: 3rem;
        }

        .footer-text {
            color: var(--secondary);
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .charts-container {
                grid-template-columns: 1fr;
            }

            .tables-container {
                grid-template-columns: 1fr;
            }

            #sidebar {
                transform: translateX(-100%);
            }

            #main-content {
                margin-left: 0;
            }

            .sidebar-open #sidebar {
                transform: translateX(0);
            }

            .sidebar-open #main-content {
                margin-left: var(--sidebar-width);
            }
        }

        @media (max-width: 768px) {
            .quick-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .doc-type-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {

            .quick-stats,
            .doc-type-cards {
                grid-template-columns: 1fr;
            }

            .dashboard-content {
                padding: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div id="sidebar">
        <!-- Logo -->
        <div class="sidebar-header">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-gavel"></i>
                </div>
                <div>
                    <div class="logo-text">PORTAL HUKUM</div>
                    <div class="logo-subtext">Sistem Desa Digital</div>
                </div>
            </div>
        </div>

        <!-- Menu -->
        <div class="sidebar-menu">
            <ul class="nav flex-column">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Produk Hukum -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#produkHukumMenu">
                        <i class="fas fa-gavel"></i>
                        <span>Produk Hukum</span>
                        <i class="fas fa-chevron-down arrow ms-auto"></i>
                    </a>
                    <div class="collapse {{ request()->is('produk-hukum*') || request()->is('jenis_dokumen*') || request()->is('kategori_dokumen*') || request()->is('lampiran-dokumen*') ? 'show' : '' }}"
                        id="produkHukumMenu">
                        <div class="submenu">
                            <a class="nav-link {{ request()->routeIs('produkHukum.index') ? 'active' : '' }}"
                                href="{{ route('produkHukum.index') }}">
                                <i class="fas fa-file-alt"></i>
                                <span>Dokumen Hukum</span>
                            </a>
                            <a class="nav-link {{ request()->routeIs('lampiranDokumen.*') ? 'active' : '' }}"
                                href="{{ route('lampiranDokumen.index') }}">
                                <i class="fas fa-paperclip"></i>
                                <span>Lampiran</span>
                            </a>
                            <a class="nav-link {{ request()->routeIs('jenis_dokumen.*') ? 'active' : '' }}"
                                href="{{ route('jenis_dokumen.index') }}">
                                <i class="fas fa-tags"></i>
                                <span>Jenis Dokumen</span>
                            </a>
                            <a class="nav-link {{ request()->routeIs('kategori_dokumen.*') ? 'active' : '' }}"
                                href="{{ route('kategori_dokumen.index') }}">
                                <i class="fas fa-folder"></i>
                                <span>Kategori</span>
                            </a>
                        </div>
                    </div>
                </li>

                <!-- Data Warga -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('warga.*') ? 'active' : '' }}"
                        href="{{ route('warga.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Data Warga</span>
                    </a>
                </li>

                <!-- Manajemen User (Hanya Admin) -->
                @if (auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->role === 'Admin'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}"
                            href="{{ route('user.index') }}">
                            <i class="fas fa-user-cog"></i>
                            <span>Manajemen User</span>
                        </a>
                    </li>
                @endif

                <!-- Tim Pengembang -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tim-pengembang') ? 'active' : '' }}"
                        href="{{ route('tim-pengembang') }}">
                        <i class="fas fa-code-branch"></i>
                        <span>Tim Pengembang</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- User Profile in Sidebar -->
        <div class="user-profile-sidebar">
            <div class="user-info">
                <div class="user-avatar">
                    {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                </div>
                <div class="user-details">
                    <h6 class="mb-1">{{ auth()->user()->name ?? 'Administrator' }}</h6>
                    <span class="badge bg-primary">{{ auth()->user()->role ?? 'Admin' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div id="main-content">
        <!-- Top Navbar -->
        <nav class="top-navbar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-title">
                            <h1>@yield('title', 'Dashboard')</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">@yield('title', 'Dashboard')</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="user-dropdown dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <div class="user-avatar-sm">
                                    {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                                </div>
                                <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                                <i class="fas fa-chevron-down ms-2"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                                        <i class="fas fa-user me-2"></i> Profil Saya
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <main class="dashboard-content">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="footer-text mb-0">
                            <i class="fas fa-clock me-1"></i>
                            Update terakhir: {{ now()->format('d F Y, H:i') }}
                        </p>
                    </div>
                    <div class="col-md-6 text-end">
                        <p class="footer-text mb-0">
                            &copy; {{ date('Y') }} Portal Hukum Desa v2.0
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Sidebar toggle for mobile
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.createElement('button');
            sidebarToggle.className = 'btn btn-primary d-lg-none';
            sidebarToggle.innerHTML = '<i class="fas fa-bars"></i>';
            sidebarToggle.style.position = 'fixed';
            sidebarToggle.style.bottom = '20px';
            sidebarToggle.style.right = '20px';
            sidebarToggle.style.zIndex = '1001';
            sidebarToggle.style.width = '50px';
            sidebarToggle.style.height = '50px';
            sidebarToggle.style.borderRadius = '50%';
            sidebarToggle.style.boxShadow = '0 4px 15px rgba(0,0,0,0.2)';

            sidebarToggle.addEventListener('click', function() {
                document.body.classList.toggle('sidebar-open');
            });

            document.body.appendChild(sidebarToggle);

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth < 992 &&
                    document.body.classList.contains('sidebar-open') &&
                    !event.target.closest('#sidebar') &&
                    !event.target.closest('.btn-primary.d-lg-none')) {
                    document.body.classList.remove('sidebar-open');
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
