<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = session('locale', 'uk');

        if (!in_array($locale, ['uk', 'ru'])) {
            $locale = 'uk';
        }

        app()->setLocale($locale);

        return $next($request);
    }
}