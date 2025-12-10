@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="container-fluid">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">✏️ Edit Profil</h1>
        <a href="{{ route('profile.show') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-left-success" role="alert">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ganti Foto Profil</h6>
                </div>
                <div class="card-body text-center">

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            @if($user->profile_picture)
                                <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                     class="img-thumbnail rounded-circle mb-3"
                                     style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=4e73df&color=ffffff"
                                     class="img-thumbnail rounded-circle mb-3"
                                     style="width: 150px; height: 150px;">
                            @endif
                            <p class="small text-muted mb-2">Format: JPG, PNG (Max. 2MB)</p>
                        </div>

                        <div class="form-group text-left">
                            <label for="profile_picture" class="small font-weight-bold">Pilih File Baru</label>
                            <input type="file"
                                   class="form-control-file @error('profile_picture') is-invalid @enderror"
                                   name="profile_picture"
                                   id="profile_picture">

                            @error('profile_picture')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-upload fa-sm text-white-50 mr-1"></i> Upload Foto
                        </button>
                    </form>

                    @if($user->profile_picture)
                        <hr>
                        <form action="{{ route('profile.destroy') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-danger btn-sm btn-block"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus foto profil ini?')">
                                <i class="fas fa-trash fa-sm mr-1"></i> Hapus Foto
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4 border-left-info">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Dasar</h6>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control bg-light" value="{{ $user->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">Alamat Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control bg-light" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">Role / Peran</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control bg-light" value="Administrator" readonly>
                            </div>
                        </div>

                        <div class="alert alert-info small mt-3">
                            <i class="fas fa-info-circle mr-1"></i>
                            Untuk saat ini, Anda hanya dapat mengubah <strong>Foto Profil</strong>. Hubungi admin utama untuk perubahan data sensitif lainnya.
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
