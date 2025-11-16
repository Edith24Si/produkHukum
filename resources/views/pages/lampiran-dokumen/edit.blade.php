@extends('layouts.app')

@section('content')
<h3>Edit Lampiran</h3>

<form action="{{ route('lampiran-dokumen.update', $lampiran->lampiran_id) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Dokumen</label>
        <select name="dokumen_id" class="form-control">
            @foreach($dokumen as $d)
                <option value="{{ $d->id }}" {{ $lampiran->dokumen_id == $d->id ? 'selected' : '' }}>
                    {{ $d->judul }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <input type="text" name="keterangan" class="form-control" value="{{ $lampiran->keterangan }}">
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
