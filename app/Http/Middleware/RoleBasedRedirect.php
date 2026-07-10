<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleBasedRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $path = $request->path();

            // 1. Jika user memiliki role Admin atau Operator
            if ($user->hasRole(['Admin', 'Operator'])) {
                // Blokir akses ke rute pemesanan frontend atau riwayat sewa pelanggan, arahkan ke admin panel
                if ($request->routeIs('booking.create') || $request->routeIs('booking.store') || $request->routeIs('booking.history')) {
                    return redirect('/admin')->with('error', 'Halaman pemesanan hanya dapat diakses oleh Pelanggan.');
                }
            }

            // 2. Jika user memiliki role Pelanggan
            if ($user->hasRole('Pelanggan')) {
                // Blokir akses ke rute admin panel Filament (kecuali logout)
                if (str_starts_with($path, 'admin') && $path !== 'admin/logout') {
                    return redirect('/')->with('error', 'Anda tidak memiliki otorisasi untuk mengakses Admin Panel.');
                }
            }
        }

        return $next($request);
    }
}
