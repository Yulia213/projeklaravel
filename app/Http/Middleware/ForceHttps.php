<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceHttps
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('X-Forwarded-Proto') !== 'https') {
            return $next($request);
        }
        return $next($request);
    }
}
