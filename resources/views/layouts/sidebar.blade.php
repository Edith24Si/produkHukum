<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-gavel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PRODUK HUKUM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Menu Utama Section -->
    <div class="sidebar-heading">
        MENU UTAMA
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Fitur Utama Section -->
    <div class="sidebar-heading">
        FITUR UTAMA
    </div>

    <!-- Nav Item - Manajemen Dokumen Dropdown -->
    <li class="nav-item">
        <a class="nav-link dropdown-toggle" href="javascript:void(0)" onclick="toggleDropdown('manajemenDokumen')">
            <i class="fas fa-fw fa-folder"></i>
            <span>Manajemen Dokumen</span>
        </a>
        <div class="dropdown-menu" id="manajemenDokumen">
            <a class="dropdown-item {{ request()->is('produk*') ? 'active' : '' }}" href="{{ route('produkHukum.index') }}">
                <i class="fas fa-file-contract mr-2"></i>Data Produk Hukum
            </a>
            <a class="dropdown-item {{ request()->is('kategori*') ? 'active' : '' }}" href="{{ route('kategori_dokumen.index') }}">
                <i class="fas fa-folder mr-2"></i>Kategori Dokumen
            </a>
            <a class="dropdown-item {{ request()->is('jenis*') ? 'active' : '' }}" href="{{ route('jenis_dokumen.index') }}">
                <i class="fas fa-file-alt mr-2"></i>Jenis Dokumen
            </a>
            <a class="dropdown-item {{ request()->is('lampiran*') ? 'active' : '' }}" href="{{ url('/lampiran-dokumen') }}">
                <i class="fas fa-paperclip mr-2"></i>Lampiran Dokumen
            </a>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Master Data Section -->
    <div class="sidebar-heading">
        MASTER DATA
    </div>

    <!-- Nav Item - Data Master Dropdown -->
    <li class="nav-item">
        <a class="nav-link dropdown-toggle" href="javascript:void(0)" onclick="toggleDropdown('dataMaster')">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Master</span>
        </a>
        <div class="dropdown-menu" id="dataMaster">
            <a class="dropdown-item {{ request()->is('user*') ? 'active' : '' }}" href="{{ route('user.index') }}">
                <i class="fas fa-users-cog mr-2"></i>Manajemen User
            </a>
            <a class="dropdown-item {{ request()->is('warga*') ? 'active' : '' }}" href="{{ route('warga.index') }}">
                <i class="fas fa-users mr-2"></i>Data Warga
            </a>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>

<script>
function toggleDropdown(dropdownId) {
    var dropdown = document.getElementById(dropdownId);
    var allDropdowns = document.querySelectorAll('.dropdown-menu');

    // Tutup semua dropdown lainnya
    allDropdowns.forEach(function(item) {
        if (item.id !== dropdownId) {
            item.style.display = 'none';
        }
    });

    // Toggle dropdown yang diklik
    if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
    } else {
        dropdown.style.display = 'block';
    }
}

// Tutup dropdown ketika klik di luar
document.addEventListener('click', function(event) {
    if (!event.target.matches('.dropdown-toggle')) {
        var dropdowns = document.querySelectorAll('.dropdown-menu');
        dropdowns.forEach(function(dropdown) {
            dropdown.style.display = 'none';
        });
    }
});
</script>

<style>
.sidebar {
    background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
}

.sidebar .nav-link {
    color: rgba(255,255,255,0.8);
    padding: 1rem;
    margin: 0.1rem 0;
    cursor: pointer;
}

.sidebar .nav-link:hover {
    color: #fff;
    background: rgba(255,255,255,0.1);
}

.dropdown-menu {
    display: none;
    background: white;
    border: none;
    border-radius: 0.35rem;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    margin-left: 1rem;
    padding: 0.5rem 0;
}

.dropdown-item {
    padding: 0.6rem 1.5rem;
    color: #3a3b45;
    text-decoration: none;
    display: block;
    font-size: 0.9rem;
    border-left: 3px solid transparent;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
    color: #2e59d9;
    border-left-color: #4e73df;
}

.dropdown-item.active {
    background-color: #4e73df;
    color: white;
    border-left-color: #2e59d9;
}

.dropdown-toggle::after {
    content: '\f107';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    float: right;
    border: none;
    margin-left: 0.5rem;
}
</style>
