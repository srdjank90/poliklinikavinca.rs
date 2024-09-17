<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrailingSlashMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $uri = $request->getRequestUri();

        // Check if the URI doesn't end with a slash and isn't a file (e.g., .php, .jpg)
        if (!preg_match('/\/$/', $uri) && !pathinfo($uri, PATHINFO_EXTENSION)) {
            return redirect($uri . '/', 301); // Redirect to the same URL with a trailing slash
        }

        return $next($request);
    }
}
