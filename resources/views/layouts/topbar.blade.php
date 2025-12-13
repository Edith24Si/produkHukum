<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">
        @guest
            <!-- Tampilkan login button untuk guest -->
            <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm mt-3">
                    <i class="fas fa-sign-in-alt fa-sm text-white-50 mr-1"></i> Login
                </a>
            </li>
        @endguest

        @auth
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- User Dropdown -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        {{ Auth::user()->name }}
                    </span>
                    <img class="img-profile rounded-circle"
                         src="{{ asset('assets-admin/img/undraw_profile.svg') }}"
                         alt="Profile">
                </a>

                <!-- Dropdown Menu -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                     aria-labelledby="userDropdown">

                    <!-- Profile -->
                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profil Saya
                    </a>

                    <!-- Settings -->
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Pengaturan
                    </a>

                    <!-- Activity Log -->
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Log Aktivitas
                    </a>

                    <!-- Last Login Info -->
                    <div class="dropdown-divider"></div>

                    <div class="dropdown-item d-flex align-items-center">
                        <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        <div>
                            <small class="text-muted">Terakhir Login:</small>
                            <div class="font-weight-bold">
                                @if(session('last_login'))
                                    {{ date('d M Y H:i', strtotime(session('last_login'))) }}
                                @else
                                    Sekarang
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="dropdown-divider"></div>

                    <!-- Logout Form (POST) -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="dropdown-item text-danger" href="#"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                        Logout
                    </a>
                </div>
                <!-- End Dropdown Menu -->
            </li>
            <!-- End User Dropdown -->
        @endauth
    </ul>
</nav>
