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
        $middleware->alias([
            // 'admin' => \App\Http\Middleware\RoleMiddleware::class.':admin',
            // 'PJGT' => \App\Http\Middleware\RoleMiddleware::class.':PJGT',
            // 'GT' => \App\Http\Middleware\RoleMiddleware::class.':GT',
            // 'pengurus' => \App\Http\Middleware\RoleMiddleware::class.':pengurus',
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
