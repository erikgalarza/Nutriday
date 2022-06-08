<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Nutricionista;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   

   


    public function login(Request $request)
    {
        //validacion
        $user = User::where('email',$request->email)->first();
            Auth::login($user);
            if(Auth()->user()->hasRole('Administrador')){
                return redirect()->route('administrador.dashboard');
            }
            if(Auth()->user()->hasRole('Nutricionista')){
                return redirect()->route('administrador.dashboard');
            }
            if(Auth()->user()->hasRole('Paciente')){
                return redirect()->route('cliente.dashboard');
            }
            
     
    }

}
