<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClienteMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
         //solo el cliente podra ver sus rutas, ejemplo: mi perfil
         if(auth()->check() && auth()->user()->hasRole('Paciente')  ) 
         return $next($request);
          else
            //sino redirigir a login
        return redirect()->route('login');
    }
}
