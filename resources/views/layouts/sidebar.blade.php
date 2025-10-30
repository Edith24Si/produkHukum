<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-gavel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PRODUK HUKUM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Menu Utama
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('warga.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Warga</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('produk*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('produkHukum.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Produk Hukum</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('produk*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kategori_dokumen.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kategori Dokumen</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('produk*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('produkHukum.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Jenis Dokumen</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('produk*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('produkHukum.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Lampiran Dokumen</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>