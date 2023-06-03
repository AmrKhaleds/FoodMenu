<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class GuestIdentifierMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sessionKey = 'guestIdentifier';
        
        if (!$request->hasCookie($sessionKey)) {
            $guestIdentifier = 'guest_' . uniqid();
            Session::put($sessionKey, $guestIdentifier);
        }

        return $next($request);
    }
}
