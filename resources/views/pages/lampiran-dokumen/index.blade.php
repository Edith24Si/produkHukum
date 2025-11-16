@extends('layouts.app')

@section('content')
<h3>Data Lampiran Dokumen</h3>

<a href="{{ route('lampiran-dokumen.create') }}" class="btn btn-primary mb-3">Tambah Lampiran</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Dokumen</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lampiran as $l)
        <tr>
            <td>{{ $l->lampiran_id }}</td>
            <td>{{ $l->dokumen->judul ?? '-' }}</td>
            <td>{{ $l->keterangan }}</td>
            <td>
                <a href="{{ route('lampiran-dokumen.edit', $l->lampiran_id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('lampiran-dokumen.destroy', $l->lampiran_id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
