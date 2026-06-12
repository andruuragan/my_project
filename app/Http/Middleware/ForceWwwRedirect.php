<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceWwwRedirect
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();

        // Список доменов, которые нужно перенаправлять на www
        $domainsToRedirect = [
            'dymsystems.pp.ua',
            // Сюда можно добавить другие ваши зеркала, если они появятся:
            // 'dymsystems.com', 
            // 'dymsystems.net',
        ];

        if (in_array($host, $domainsToRedirect, true)) {
            return redirect()->to(
                'https://www.dymsystems.pp.ua' . $request->getRequestUri(),
                301
            );
        }

        return $next($request);
    }
}