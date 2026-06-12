<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceWwwRedirect
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();

        if ($host === 'dymsystems.pp.ua') {
            return redirect()->to(
                'https://www.dymsystems.pp.ua' . $request->getRequestUri(),
                301
            );
        }

        return $next($request);
    }
}
