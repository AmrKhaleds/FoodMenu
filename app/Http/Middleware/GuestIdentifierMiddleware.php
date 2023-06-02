<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class GuestIdentifierMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->hasCookie('guestIdentifier')){
            // Generate a unique guest identifier
            $guestIdentifier = 'guest_' . uniqid();
            // Set the guest identifier as a cookie
            Cookie::queue(Cookie::make('guestIdentifier', $guestIdentifier, 60));
        }
        return $next($request);
    }
}
