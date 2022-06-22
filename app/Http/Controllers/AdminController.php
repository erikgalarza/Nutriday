<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Nutricionista;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Paciente;

class AdminController extends Controller
{
   
    // public function index()
    // {
    //     $admins = User::
    //    return view('admin.administradores.index',compact('admins'));
    // }

    public function buscarPacientes(Request $request)
    {
        $nombre_completo = $request->get('paciente');
        $apellido = '';
            for($i = 0 ; $i<strlen($nombre_completo) ;$i++) 
            {
                if($nombre_completo[$i]==" ")
                    $apellido = substr($nombre_completo,$i+1);
            }

            if($apellido!='')
                $pacientes = Paciente::where('nombre','like','%'.$nombre_completo.'%')->orWhere('apellido','like','%'.$apellido.'%')->get(); 
            else
                $pacientes = Paciente::where('nombre','like','%'.$nombre_completo.'%')->get();  

        return view('admin.contenidoDashboard',compact('pacientes'));
    }


    public function buscarNutricionistas(Request $request)
    {
        $nombre_completo = $request->get('nutricionista');
        $apellido = '';
        for($i = 0 ; $i<strlen($nombre_completo) ;$i++) 
        {
            if($nombre_completo[$i]==" ")
                $apellido = substr($nombre_completo,$i+1);
        }

        if($apellido!='')
            $nutricionistas = Nutricionista::where('nombre','like','%'.$nombre_completo.'%')->orWhere('apellido','like','%'.$apellido.'%')->get();  
        else
            $nutricionistas = Nutricionista::where('nombre','like','%'.$nombre_completo.'%')->get(); 

        return view('admin.contenidoDashboard',compact('nutricionistas'));
    }
 

    public function listarPacientes()
    {
        $pacientes = User::role('Cliente')->get();
        return view('admin.paciente.index',compact('pacientes'));
    }

    public function formCuenta()
    {
        $administrador =Admin::find(Auth::id());
        return view('admin.cuenta.editarCuenta',compact('administrador'));
    }

    public function updateCuenta(Request $request)
    {
        $hashpass = Hash::make($request->password);
       $user = User::find(Auth::id());
       if($request->password!=null)
            $user->update(["password"=>$hashpass]);
       return back();
    }

    public function miCuenta(){
        $administrador =Admin::find(Auth::id());
        // dd($administrador);

        return view('admin.cuenta.cuenta',compact('administrador'));
    }

  

   

    public function dashboard()
    {
        return view('admin.contenidoDashboard');
    }




   

    public function listar(){
        $admins = User::role('Administrador')->get();
        // $administradores = collect(Admin::class);
        // foreach($admins as $admin){
        //     dd($admin->administradores);
        //     // $administradores->push($admin);
        // }
        // dd($admins);
        return view('admin.administradores.index',compact('admins'));
    }

  
    public function create()
    {
        
        return view('admin.administradores.create');
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(UpdateAdminRequest $request, $id)
    {
       
        $administrador = Admin::find($id);
        $user_id = $administrador->user->id;
        $user = User::find($user_id);

        $pass=$user->password;
        if($request->password)
            $pass = Hash::make($request->password);

        $user->update([
            "email"=>$request->email,
            "password"=>$pass
        ]);
        
    
        $administrador->update([
            "nombre"=>$request->nombre,
            "cedula"=>$request->cedula,
            "telefono"=>$request->telefono,
           
        ]);
        return back();
    }

    
    public function destroy($id)
    {
        // dd($id);
        $admin = Admin::where('user_id',$id)->first();

        if($admin->estado=="activo")
        {
            $admin->update([
                "estado"=>"inactivo"
            ]);
        }else{
            $admin->update([
                "estado"=>"activo"
            ]);
        }
        return back();
    }
}
