<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
         //si esta iniciado sesion y tiene el rol de admin entonces de paso a la ruta que busca
         if( auth()->check() && auth()->user()->hasRole('Administrador'))
            return $next($request);
            //sino redirigir a login
        return redirect()->route('login');
    }
}
