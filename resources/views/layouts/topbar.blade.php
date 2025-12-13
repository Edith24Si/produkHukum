<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">
        @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm mt-3">
                    <i class="fas fa-sign-in-alt fa-sm text-white-50 mr-1"></i> Login
                </a>
            </li>
        @endguest

        @auth
           {{-- PERBAIKAN: Link Logout GET di topbar telah dihilangkan atau dikomentari --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('auth.logout') }}">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span>
                    <i class="fas fa-sign-out-alt fa-sm fa-fw text-gray-400"></i>
                </a>
            </li> --}}
            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    @auth #
                        <span>{{ Auth::user()->name }}</span>
                    @else
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                    @endauth
                    <img class="img-profile rounded-circle" src="{{ asset('assets-admin/img/undraw_profile.svg') }}">
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profil
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Pengaturan
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Log Aktivitas
                        {{ session('last_login') }}
                    </a>
                    <div class="dropdown-divider"></div>


            <li class="nav-item">
                <a class="nav-link" href="{{ route('auth.logout') }}">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span>
                    <i class="fas fa-sign-out-alt fa-sm fa-fw text-gray-400"></i>
                </a>
            </li>
                </div>
            </li>
        @endauth
    </ul>
</nav>
