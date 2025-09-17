<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\SetLocale;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register as a route middleware alias
        $middleware->alias([
            'locale' => SetLocale::class,
        ]);

        // EITHER apply it to the "web" group...
        $middleware->appendToGroup('web', SetLocale::class);

        // ...OR make it global (pick one, not both)
        // $middleware->append(SetLocale::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
