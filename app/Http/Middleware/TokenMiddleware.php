<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $typeToken): Response
    {
		if($request->header('token') !== $typeToken){
			return response(['error' => 'Invalid token'], Response::HTTP_UNAUTHORIZED);
		}

        return $next($request);
    }
}
