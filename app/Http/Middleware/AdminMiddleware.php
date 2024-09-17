<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();

            // Check if the user has the admin role (assuming admin role_id is 1)
            if ($user->role_id == 1 || $user->role_id == 2) {
                // User has admin role, allow access to the admin section
                return $next($request);
            }
        }

        // If user is not authenticated or doesn't have admin role, redirect or abort as necessary
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}
