<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Nutricionista;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreNutricionistaRequest;
use App\Http\Requests\UpdateNutricionistaRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class NutricionistaController extends Controller
{

    //listar todos los nutri
    public function index()
    {
        // $nutricionistas = Nutricionista::all();
        $nutricionistas = User::role('Nutricionista')->get();

        return view('admin.nutricionistas.index',compact('nutricionistas'));
    }

    public function listado()
    {
        $nutricionistas = User::role('Nutricionista')->get();

        return view('admin.nutricionistas.index',compact('nutricionistas'));
    }

    public function miCuenta(){
        $user = User::find(Auth::id());
        $nutricionista = Nutricionista::where('user_id',$user->id)->first();
        return view('nutri.cuenta.cuenta',compact('nutricionista'));
    }

    public function formCuenta()
    {
        $user = User::find(Auth::id());

   $nutricionista =Nutricionista::where('user_id',$user->id)->first();
        return view('nutri.cuenta.editarCuenta',compact('nutricionista'));
    }

    public function updateCuenta(Request $request)
    {
        // dd($request);
        $hashpass = Hash::make($request->password);
        $user = User::find(Auth::id());
        if($request->password!=null)
            $user->update(["password"=>$hashpass]);

       $nutricionista = Nutricionista::where('user_id',$user->id)->first();
       $nutricionista->update([
        "nombre"=>$request->nombre,
        "apellido"=>$request->apellido,
        "sexo"=>$request->sexo,
        "especialidad"=>$request->especialidad,
        "cedula"=>$request->cedula,
        "telefono"=>$request->telefono,
       ]);

       if (request()->hasFile('imagen')) {
        //    dd("hola");
        $url="";
      $file = $request->imagen;
          $elemento= Cloudinary::upload($file->getRealPath(),['folder'=>'nutricionista']);
          $public_id = $elemento->getPublicId();
          $url = $elemento->getSecurePath();
    if(is_null($nutricionista->imagen)){
          $nutricionista->imagen()->create([
              'url'=>$url,
              'public_id'=>$public_id
              ]);
    }else{
          $pid = $nutricionista->imagen->public_id;
          Cloudinary::destroy($pid);//Eliminamos la imagen anterior de cloud
          $nutricionista->imagen()->update([
              'url'=>$url,
              'public_id'=>$public_id
              ]);
    }
    }
       return back();
    }

    // public function dashboard(){
    //     return view('nutri.dashboard');
    // }


     //traer el form de creacion
    public function create()
    {
        //
        return view('admin.nutricionistas.create');
    }


    public function store(StoreNutricionistaRequest $request)
    {

        $hashpass = Hash::make($request->password);
        $user = User::create([
            "email"=>$request->correo,
            "password"=>$request->password,
        ]);
        $user->assignRole('Nutricionista');
        $nutricionista = $user->nutricionistas()->create([
            "nombre"=>$request->nombre,
            "apellido"=>$request->apellido,
            "cedula"=>$request->cedula,
            "sexo"=>$request->sexo,
            "telefono"=>$request->telefono,
            "correo"=>$request->correo,

            "especialidad"=>$request->especialidad,
            "user_id"=>$user->id
        ]);



        if ($request->hasFile('imagen')) {
            $url = "";
            $file = $request->imagen;
            $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'nutricionista']);
            // dd($elemento);
            $public_id = $elemento->getPublicId();
            $url = $elemento->getSecurePath();

            $nutricionista->imagen()->create([
                "url" => $url,
                "public_id" => $public_id
            ]);
        }





        return back();
    }

    public function crearNutri()
    {
        return view('admin.nutricionistas.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nutricionista  $nutricionista
     * @return \Illuminate\Http\Response
     */
    public function show(Nutricionista $nutricionista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nutricionista  $nutricionista
     * @return \Illuminate\Http\Response
     */
    public function edit(Nutricionista $nutricionista)
    {
        //
    }


    public function update(UpdateNutricionistaRequest $request, $id)
    {

        $user = User::find($id);
        $nutricionista = $user->nutricionistas()->first();
        $pass=$user->password;
        if($request->password)
            $pass = Hash::make($request->password);

        $user->update([
            "email"=>$request->correo,
            "password"=>$pass
        ]);

        $nutricionista->update([
            "nombre"=>$request->nombre,
            "sexo"=>$request->sexo,
            "especialidad"=>$request->especialidad,
            "apellido"=>$request->apellido,
            "correo"=>$request->correo,
            "cedula"=>$request->cedula,
            "telefono"=>$request->telefono,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nutricionista  $nutricionista
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        // Nutricionista::destroy($id);
        $nutri = Nutricionista::where('user_id',$id)->first();
        // dd($nutri);
        if($nutri->estado=="activo")
        {
            $nutri->update([
                "estado"=>"inactivo"
            ]);
        }else{
            $nutri->update([
                "estado"=>"activo"
            ]);
        }
        return back();
    }
}
