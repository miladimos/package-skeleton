<?php

namespace Vendor\Package\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PackageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
