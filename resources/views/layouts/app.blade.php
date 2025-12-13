<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Portal Akses Dashboard</title>

    <link href="{{ asset('assets-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{ asset('assets-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        /* Memaksa dropdown tampil jika class 'show' aktif, mengabaikan inline style display:none */
        .navbar-nav .dropdown-menu.show {
            display: block !important;
            top: 100% !important;
            /* Memastikan posisi turun ke bawah */
            transform: none !important;
            /* Mencegah popper.js salah hitung posisi */
        }
    </style>
</head>

<body id="page-top">

    <div id="wrapper">

        @include('layouts.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                @include('layouts.topbar')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            {{-- @include('layouts.wa-css') --}}
            <a href="https://wa.me/6281234567890" target="_blank" id="whatsapp-button"
                style="position: fixed; bottom: 80px; right: 20px; z-index: 99;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp"
                    width="50">
            </a>

            @include('layouts.footer')
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Siap untuk Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"> Pilih "Keluar" di bawah jika Anda siap mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                 {{-- 2. UBAH TOMBOL DI MODAL LOGOUT UNTUK SUBMIT FORM POST --}}
                    <a class="btn btn-primary" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Keluar
                    </a>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets-admin/vendor/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('assets-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <script src="{{ asset('assets-admin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
