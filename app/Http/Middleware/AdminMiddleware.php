<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Используем правильный метод isAdmin() из твоей модели User!
        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request);
        }

        // 2. Если это обычный покупатель (role === 'user'):
        if (auth()->check()) {
            return redirect()->route('shop.index')
                ->with('error_alert', 'У вас немає прав доступу до цього розділу.');
        }

        // 3. Если это гость:
        return redirect()->route('shop.index')->with('open_login_modal', true);
    }
}
