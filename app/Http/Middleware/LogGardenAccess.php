<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// Demonstrating Unit X: Custom Middleware
class LogGardenAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Demonstrating Unit X: Middleware Logic
        \Log::info('Garden accessed at ' . now() . ' from IP: ' . $request->ip());
        
        return $next($request);
    }
}
