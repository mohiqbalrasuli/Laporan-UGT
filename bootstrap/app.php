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
            'admin' => \App\Http\Middleware\RoleMiddleware::class.':admin',
            'pjgt' => \App\Http\Middleware\RoleMiddleware::class.':PJGT',
            'gt' => \App\Http\Middleware\RoleMiddleware::class.':GT',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
