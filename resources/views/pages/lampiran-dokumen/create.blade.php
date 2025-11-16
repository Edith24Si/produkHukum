@extends('layouts.app')

@section('content')
<h3>Tambah Lampiran</h3>

<form action="{{ route('lampiran-dokumen.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Dokumen</label>
        <select name="dokumen_id" class="form-control" required>
            <option value="">- Pilih Dokumen -</option>
            @foreach($dokumen as $d)
                <option value="{{ $d->id }}">{{ $d->judul }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <input type="text" name="keterangan" class="form-control">
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection
