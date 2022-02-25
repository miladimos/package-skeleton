<?php

namespace Vendor\Package\Http\Middleware;

class PackageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
