@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="container-fluid">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">👤 Profil Admin website PILARHUKUM</h1>
        <span class="text-muted">Data Profil Anda</span>
    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Foto Profil</h6>
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        @if($user->profile_picture)
                            <img class="img-profile rounded-circle img-fluid"
                                 src="{{ asset('storage/' . $user->profile_picture) }}"
                                 style="width: 180px; height: 180px; object-fit: cover; border: 4px solid #eaecf4;"
                                 alt="Foto Profil">
                        @else
                            <img class="img-profile rounded-circle img-fluid"
                                 src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=180&background=4e73df&color=ffffff"
                                 style="width: 180px; height: 180px; border: 4px solid #eaecf4;"
                                 alt="Default Avatar">
                        @endif
                    </div>
                    <div class="h5 font-weight-bold text-gray-800">{{ $user->name }}</div>
                    <div class="text-muted font-italic mb-3">{{ $user->email }}</div>

                    <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Edit Profil & Foto</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Akun</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th style="width: 30%">Nama Lengkap</th>
                                <td>: {{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: {{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Status Akun</th>
                                <td>: <span class="badge badge-success">Aktif</span></td>
                            </tr>
                            <tr>
                                <th>Bergabung Sejak</th>
                                <td>: {{ $user->created_at->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <th>Terakhir Update</th>
                                <td>: {{ $user->updated_at->diffForHumans() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
