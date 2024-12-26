<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // Vérifiez si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect('/login'); // Redirection si non authentifié
        }

        // Vérifiez si l'utilisateur possède le rôle requis
        if (Auth::user()->role !== $role) {
            return abort(403, 'Accès interdit'); // Erreur 403 si rôle incorrect
        }

        return $next($request);
    }
}
