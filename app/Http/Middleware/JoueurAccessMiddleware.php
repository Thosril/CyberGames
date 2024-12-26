<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class JoueurAccessMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'joueur') {
            return $next($request);
        }

        return redirect('/'); // Redirige vers l'accueil ou une autre page
    }
}
