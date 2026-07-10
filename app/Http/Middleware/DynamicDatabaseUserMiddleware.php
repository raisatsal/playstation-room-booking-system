<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class DynamicDatabaseUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();
            $originalUsername = config('database.connections.mysql.username');
            $originalPassword = config('database.connections.mysql.password');
            
            $changed = false;
            $targetUsername = null;
            if ($user->hasRole('Operator')) {
                $targetUsername = 'db_operator_playstation';
                config([
                    'database.connections.mysql.username' => 'db_operator_playstation',
                    'database.connections.mysql.password' => 'operator123',
                ]);
                $changed = true;
            } elseif ($user->hasRole('Admin')) {
                $targetUsername = 'db_admin_playstation';
                config([
                    'database.connections.mysql.username' => 'db_admin_playstation',
                    'database.connections.mysql.password' => 'admin123',
                ]);
                $changed = true;
            }

            if ($changed) {
                DB::purge('mysql');
                try {
                    // Coba koneksi ke database untuk memastikan user sudah dibuat di MySQL
                    DB::connection()->getPdo();
                } catch (\Exception $e) {
                    // Jika gagal, kembalikan ke kredensial default dari .env agar tidak crash
                    config([
                        'database.connections.mysql.username' => $originalUsername,
                        'database.connections.mysql.password' => $originalPassword,
                    ]);
                    DB::purge('mysql');
                    
                    logger()->warning("Multi Database User: Gagal koneksi sebagai {$targetUsername}. Melakukan fallback ke koneksi default. Error: " . $e->getMessage());
                }
            }
        }

        return $next($request);
    }
}
