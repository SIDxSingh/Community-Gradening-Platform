<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogGardenAccess
{
    
    public function handle(Request $request, Closure $next): Response
    {
        \Log::info('Garden accessed at ' . now() . ' from IP: ' . $request->ip());
        
        return $next($request);
    }
}
