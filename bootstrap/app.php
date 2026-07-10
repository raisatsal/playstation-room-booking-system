<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            \App\Http\Middleware\RoleBasedRedirect::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Redirect Pelanggan to homepage with friendly message
        // when Filament blocks admin panel access with 403
        $exceptions->render(function (
            \Symfony\Component\HttpKernel\Exception\HttpException $e,
            \Illuminate\Http\Request $request
        ) {
            if ($e->getStatusCode() === 403 && str_starts_with($request->path(), 'admin')) {
                if (auth()->check() && auth()->user()->hasRole('Pelanggan')) {
                    return redirect('/')
                        ->with('error', 'Anda tidak memiliki otorisasi untuk mengakses Admin Panel.');
                }
            }
        });
    })->create();
