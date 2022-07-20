<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrarAdminRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class RegController extends Controller
{
    public function registrarAdmin(RegistrarAdminRequest $request){
        //validacion
       
        //fin validacion

        $pass = Hash::make($request->password);
        $user = User::create([
            "email"=>$request->email,
            "password"=>$pass,
        ]);
  

        $admin = $user->administradores()->create([
            "nombre"=>$request->nombre,
            "cedula"=>$request->cedula,
            "telefono"=>$request->telefono
        ]);
        
        if ($request->hasFile('imagen')) {
            $url = "";
            $file = $request->imagen;
            $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'administrador']);
            $public_id = $elemento->getPublicId();
            $url = $elemento->getSecurePath();

            $admin->imagen()->create([
                "url" => $url,
                "public_id" => $public_id
            ]);
        }

        $user->assignRole('Administrador');
        return redirect()->route('administrador.listar');
    }
}
