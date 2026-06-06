<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (auth()->user()->role !== 'user') {
            // Jika admin mencoba akses halaman user, arahkan ke dashboard admin
            if (auth()->user()->role === 'admin') {
                return redirect()->route('dashboard')
                    ->with('warning', 'Anda sudah login sebagai Administrator.');
            }

            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}