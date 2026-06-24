<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
   ->withMiddleware(function (Middleware $middleware): void {

    // Додаємо підтримку довірених проксі (для Render)
    $middleware->trustProxies(at: '*');

    // Ваші існуючі мідлвари
    $middleware->append(\App\Http\Middleware\ForceWwwRedirect::class);

    $middleware->alias([
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ]);

})
    ->withExceptions(function (Exceptions $exceptions): void {

        $exceptions->render(function (AuthenticationException $exception, Request $request) {

            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }

            return redirect()->route('shop.index')
                ->with('open_login_modal', true);
        });

    })->create();