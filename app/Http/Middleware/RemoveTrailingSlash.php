<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class RemoveTrailingSlash
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $pathInfo = $request->getPathInfo();

        if ($request->isMethod('GET') && $pathInfo !== '/' && Str::endsWith($pathInfo, '/')) {
            $path = rtrim($pathInfo, '/');
            $query = $request->getQueryString();
            $url = $request->getBaseUrl() . $path . ($query ? '?' . $query : '');
            
            return redirect($url, 301);
        }

        return $next($request);
    }
}
