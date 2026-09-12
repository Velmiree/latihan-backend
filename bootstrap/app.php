<?php

use App\Http\Middleware\CatatRequest;
use App\Http\Middleware\TolakUserAgentKosong;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Berlaku untuk seluruh rute pada berkas api.php
        $middleware->api(append: [
            CatatRequest::class,
        ]);

        $middleware->alias([
            'cek-user-agent' => TolakUserAgentKosong::class,
        ]);

    })
    ->withExceptions(function ($exceptions) {
        //
    })
    ->create();