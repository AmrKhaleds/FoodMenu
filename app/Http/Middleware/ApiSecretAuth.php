<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiSecretAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $key = $request->secret_key;

        if (!$key || $key != config('app.secret_key'))
            return response()->json([
                'status' => false,
                'data' => [],
                'message' => 'Invalid API Key'
            ], 401);


        return $next($request);
    }
}
