<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckAdmin;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // register a route middleware alias (use this in routes/controllers)
        $middleware->alias([
            'check.admin' => CheckAdmin::class,
        ]);

        // optionally append it to the 'web' group if you want it run automatically
        // $middleware->appendToGroup('web', CheckAdmin::class);

        // add any global middleware:
        // $middleware->append(\App\Http\Middleware\SomeGlobalMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();


    