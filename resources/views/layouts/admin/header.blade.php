<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    {{-- Anda dapat menghapus search bar jika tidak digunakan --}}
    {{-- <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> --}}

    <ul class="navbar-nav ml-auto">

        {{-- Jika Anda memiliki link logout terpisah di topbar, Anda bisa menghapusnya --}}
        {{-- <li class="nav-item">...</li> --}}

        <div class="topbar-divider d-none d-sm-block"></div>

        {{-- START: User Dropdown Dinamis (Tampilan Foto/Inisial) --}}
        @auth
            <li class="nav-item dropdown no-arrow">
                {{-- data-toggle="dropdown" disesuaikan dengan template SB Admin 2 --}}
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>

                    {{-- START: TAMPILAN FOTO PROFIL --}}
                    @if(Auth::user()->profile_picture)
                        {{-- FOTO DARI STORAGE --}}
                        <img class="img-profile rounded-circle"
                             src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                             alt="Foto Profil"
                             style="width: 40px; height: 40px; object-fit: cover;">
                    @else
                        {{-- PLACEHOLDER INISIAL --}}
                        <div class="img-profile rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center"
                             style="width: 40px; height: 40px; font-weight: bold; font-size: 16px;">
                            {{-- Ambil inisial pertama nama --}}
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    @endif
                    {{-- END: TAMPILAN FOTO PROFIL --}}
                </a>

                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                    {{-- Link ke Halaman Edit Profil Saya --}}
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profil Saya
                    </a>

                    {{-- Link Pengaturan dan Aktivitas Riwayat dari kode lama (Optional) --}}
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Pengaturan
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Aktivitas Riwayat
                    </a>

                    <div class="dropdown-divider"></div>

                    {{-- Link Logout Standar Laravel --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Keluar
                    </a>

                    {{-- Logout Form (Wajib ada di body atau di footer app.blade.php) --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endauth
        {{-- END: User Dropdown Dinamis --}}

    </ul>
</nav>
