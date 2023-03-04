<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Este middleware verifica si el usuario ha iniciado sesión
     * y si su rol coincide con el que se ha especificado en el parámetro $role
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (! Auth::check() || Auth::user()->rol != $role) {
            return abort(403, 'Acceso denegado');
        }

        return $next($request);
    }
}
