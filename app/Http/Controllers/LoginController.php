<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Nutricionista;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   

   


    public function login(Request $request)
    {
        // dd($request);
        $hashPassword = Hash::make($request->password);
        // dd($hashPassword);
        //validacion
        $user = User::where('email',$request->email)->first();
       $password = $user->password;
       dd($password, $hashPassword);
       if($user!=null)
       {
        
        Auth::login($user);
        if(Auth::check())
        {
            
            if(Auth()->user()->hasRole('Administrador')){
                return redirect()->route('administrador.dashboard');
            }
            if(Auth()->user()->hasRole('Nutricionista')){
                return redirect()->route('administrador.dashboard');
            }
            if(Auth()->user()->hasRole('Paciente')){
                return redirect()->route('cliente.dashboard');
            }
        }else{
           
            return redirect()->route('home');
        }
       }else{
        return redirect()->route('home');
       }
            
            // if(Auth::check()){
         
        // }else{
        //     
        // }
            
     
    }

}
