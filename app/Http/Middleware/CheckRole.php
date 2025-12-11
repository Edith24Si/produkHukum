<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    // Perhatikan ...$roles (titik tiga) untuk menangani banyak role sekaligus
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek apakah role user yang sedang login ada di dalam daftar role yang diizinkan
        if (in_array(Auth::user()->role, $roles)) {
            return $next($request);
        }

        // Jika role tidak cocok, tampilkan error 403 (Forbidden)
        return abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}