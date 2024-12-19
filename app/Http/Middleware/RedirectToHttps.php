<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToHttps
{
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && env('APP_ENV') === 'production') {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}

?>