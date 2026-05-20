<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException; // <- Важно импортировать этот класс
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        // Перехватываем ошибку отсутствия авторизации
        $exceptions->render(function (AuthenticationException $exception, Request $request) {

            // Если запрос пришел через AJAX/JS (например, отправка формы или fetch)
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }

            // Если гость зашел руками через адресную строку — шлем на главную
            // Также передаем в сессию флаг 'open_login_modal', чтобы JS понял, что нужно открыть окно
            return redirect()->route('shop.index')->with('open_login_modal', true);

            // Примечание: вместо 'catalog.index' укажите имя роута вашей главной страницы (например, 'home')
        });

    })->create();
