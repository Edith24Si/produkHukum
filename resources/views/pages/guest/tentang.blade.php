@extends('layouts.guest')

@section('title', 'Tentang Kami')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold">Tentang Desa Kami</h1>
                <p class="fs-5 text-muted">Sejarah singkat, visi, dan misi desa.</p>
            </div>

            <h2 class="h4 fw-bold">Visi</h2>
            <p>"Menjadi desa yang mandiri, sejahtera, berbudaya, dan berdaya saing."</p>

            <h2 class="h4 fw-bold mt-4">Misi</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">1. Meningkatkan kualitas pelayanan publik yang cepat dan efisien.</li>
                <li class="list-group-item">2. Mengoptimalkan potensi sumber daya alam dan manusia.</li>
                <li class="list-group-item">3. Meningkatkan infrastruktur desa yang memadai.</li>
                <li class="list-group-item">4. Menjaga kearifan lokal dan budaya desa.</li>
            </ul>
        </div>
    </div>
</div>
@endsection