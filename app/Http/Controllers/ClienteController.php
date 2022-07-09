<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dieta;
use App\Models\Video;
use App\Models\Paciente;
use App\Models\EstadoAnimo;
use Illuminate\Http\Request;
use App\Models\DatosAntropometrico;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Alimento;

class ClienteController extends Controller
{
   
    public function misActividades()
    {

        $user_id = auth::id();
        
        $paciente = Paciente::where('user_id',$user_id)->first();
  
        $actividades = $paciente->actividades()->get();
        $duraciones = $paciente->actividades()->get(['duracion']);
        return view('client.actividades.index',compact('actividades','duraciones'));
    }

    public function videos()
    {
        $videos_receta = Video::where('categoria','Recetas')->get();
        $videos_ejercicio = Video::where('categoria','Ejercicios')->get();
         $videos_motivacion = Video::where('categoria','Motivacion')->get();

       return view('client.videos.index',compact('videos_receta','videos_motivacion','videos_ejercicio'));
    }

    public function detalleDieta()
    {

    }

    public function verDieta($dieta_id)
    {
        // dd("dfdfa");
       $dieta =  Dieta::find($dieta_id);
       
       $combinaciones = $dieta->acds()->get();
  
       $alimentosLunes = collect();
       $alimentosMartes = collect();
       $alimentosMiercoles = collect();
       $alimentosJueves = collect();
       $alimentosViernes = collect();
       $alimentosViernes = collect();
       $alimentosSabado = collect();
       $alimentosDomingo = collect();


       foreach($combinaciones as $combinacion)
       {
               if($combinacion->dia_id == 1 && $combinacion->comida_id==1)// lunes desayuno
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   
                   $alimento->setAttribute('horario', 'desayuno');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosLunes->push($alimento);
                //    $alimentosLunes->put('horario','desayuno');
               }
               if($combinacion->dia_id == 1 && $combinacion->comida_id==2)
               {
                
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'colacion1');
                $alimento->setAttribute('imagen', $alimento->imagen->url);
                $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosLunes->push($alimento);
               }
               if($combinacion->dia_id == 1 && $combinacion->comida_id==3)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'almuerzo');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosLunes->push($alimento);
               }
               if($combinacion->dia_id == 1 && $combinacion->comida_id==4)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'colacion2');
                $alimento->setAttribute('imagen', $alimento->imagen->url);
                $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosLunes->push($alimento);
               }
               if($combinacion->dia_id == 1 && $combinacion->comida_id==5)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'merienda');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosLunes->push($alimento); 
               }
               if($combinacion->dia_id == 1 && $combinacion->comida_id==6)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'cena');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosLunes->push($alimento); 
               }


               // ========================= MARTES ================ //
           
         
               if($combinacion->dia_id == 2 && $combinacion->comida_id==1)
               {
                   // dd($combinacion->alimento_id);
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'desayuno');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosMartes->push($alimento); 
               }

               if($combinacion->dia_id == 2 && $combinacion->comida_id==2)
               {
                   
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'colacion1');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosMartes->push($alimento);
               }
               if($combinacion->dia_id == 2 && $combinacion->comida_id==3)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'almuerzo');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosMartes->push($alimento);
               }
               if($combinacion->dia_id == 2 && $combinacion->comida_id==4)
               {
                $alimento = Alimento::find($combinacion->alimento_id);
                $alimento->setAttribute('horario', 'colacion2');
                $alimento->setAttribute('imagen', $alimento->imagen->url);
                $alimento->setAttribute('cantidad', $combinacion->cantidad);
                $alimentosMartes->push($alimento);
               }
               if($combinacion->dia_id == 2 && $combinacion->comida_id==5)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'merienda');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosMartes->push($alimento);
               }
               if($combinacion->dia_id == 2 && $combinacion->comida_id==6)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'cena');
                $alimento->setAttribute('imagen', $alimento->imagen->url);
                $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosMartes->push($alimento); 
               }

               // ==================== MIERCOLES ======================0= //
          
               if($combinacion->dia_id == 3 && $combinacion->comida_id==1)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'desayuno');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosMiercoles->push($alimento); 
               }
               if($combinacion->dia_id == 3 && $combinacion->comida_id==2)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'colacion1');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosMiercoles->push($alimento); 
               }
               if($combinacion->dia_id == 3 && $combinacion->comida_id==3)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'almuerzo');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosMiercoles->push($alimento); 
               }
               if($combinacion->dia_id == 3 && $combinacion->comida_id==4)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'colacion2');
                $alimento->setAttribute('imagen', $alimento->imagen->url);
                $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosMiercoles->push($alimento);
                     
               }
               if($combinacion->dia_id == 3 && $combinacion->comida_id==5)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'merienda');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosMiercoles->push($alimento); 
               }
               if($combinacion->dia_id == 3 && $combinacion->comida_id==6)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'cena');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosMiercoles->push($alimento); 
               }
           
           // ==================== JUEVES ======================0= //

               if($combinacion->dia_id == 4 && $combinacion->comida_id==1)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'desayuno');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosJueves->push($alimento); 
               }
               if($combinacion->dia_id == 4 && $combinacion->comida_id==2)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'colacion1');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosJueves->push($alimento); 
               }
               if($combinacion->dia_id == 4 && $combinacion->comida_id==3)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'almuerzo');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosJueves->push($alimento);
               }
               if($combinacion->dia_id == 4 && $combinacion->comida_id==4)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'colacion2');
                $alimento->setAttribute('imagen', $alimento->imagen->url);
                $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosJueves->push($alimento);
               }
               if($combinacion->dia_id == 4 && $combinacion->comida_id==5)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'merienda');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosJueves->push($alimento); 
               }
               if($combinacion->dia_id == 4 && $combinacion->comida_id==6)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'cena');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosJueves->push($alimento); 
               }
           
            // ==================== VIERNES ======================0= //
           
               if($combinacion->dia_id == 5 && $combinacion->comida_id==1)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'desayuno');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosViernes->push($alimento); 
               }
               if($combinacion->dia_id == 5 && $combinacion->comida_id==2)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'colacion1');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosViernes->push($alimento);
               }
               if($combinacion->dia_id == 5 && $combinacion->comida_id==3)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'almuerzo');
                $alimento->setAttribute('imagen', $alimento->imagen->url);
                $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosViernes->push($alimento); 
               }
               if($combinacion->dia_id == 5 && $combinacion->comida_id==4)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'colacion2');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosViernes->push($alimento);
               }
               if($combinacion->dia_id == 5 && $combinacion->comida_id==5)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'merienda');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosViernes->push($alimento);
               }
               if($combinacion->dia_id == 5 && $combinacion->comida_id==6)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);

                   $alimento->setAttribute('horario', 'cena');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosViernes->push($alimento);
               }
           
            // ==================== SABADO ======================0= //

               if($combinacion->dia_id == 6 && $combinacion->comida_id==1)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);

                   $alimento->setAttribute('horario', 'desayuno');
                $alimento->setAttribute('imagen', $alimento->imagen->url);
                $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosSabado->push($alimento); 
               }
               if($combinacion->dia_id == 6 && $combinacion->comida_id==2)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);

                   $alimento->setAttribute('horario', 'colacion1');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosSabado->push($alimento); 
               }
               if($combinacion->dia_id == 6 && $combinacion->comida_id==3)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'almuerzo');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosSabado->push($alimento); 
               }
               if($combinacion->dia_id == 6 && $combinacion->comida_id==4)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'colacion2');
                $alimento->setAttribute('imagen', $alimento->imagen->url);
                $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosSabado->push($alimento);
               }
               if($combinacion->dia_id == 6 && $combinacion->comida_id==5)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'merienda');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosSabado->push($alimento);
               }
               if($combinacion->dia_id == 6 && $combinacion->comida_id==6)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'cena');
                $alimento->setAttribute('imagen', $alimento->imagen->url);
                $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosSabado->push($alimento);
               }
           
            // ==================== DOMINGO ======================0= //

        
               if($combinacion->dia_id == 7 && $combinacion->comida_id==1)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'desayuno');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosDomingo->push($alimento); 
               }
               if($combinacion->dia_id == 7 && $combinacion->comida_id==2)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'colacion1');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosDomingo->push($alimento); 
               }
               if($combinacion->dia_id == 7 && $combinacion->comida_id==3)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'almuerzo');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosDomingo->push($alimento);
               }
               if($combinacion->dia_id == 7 && $combinacion->comida_id==4)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'colacion2');
                $alimento->setAttribute('imagen', $alimento->imagen->url);
                $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosDomingo->push($alimento);
               }
               if($combinacion->dia_id == 7 && $combinacion->comida_id==5)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'merienda');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosDomingo->push($alimento); 
               }
               if($combinacion->dia_id == 7 && $combinacion->comida_id==6)
               {
                   $alimento = Alimento::find($combinacion->alimento_id);
                   $alimento->setAttribute('horario', 'cena');
                   $alimento->setAttribute('imagen', $alimento->imagen->url);
                   $alimento->setAttribute('cantidad', $combinacion->cantidad);
                   $alimentosDomingo->push($alimento);
               }  
            } 

// dd($alimentosLunes,$alimentosMartes,$alimentosMiercoles,$alimentosJueves,$alimentosViernes, $alimentosSabado, $alimentosDomingo);

        return view('client.dietas.detalleDieta',compact('dieta','alimentosLunes','alimentosMartes','alimentosMiercoles','alimentosJueves','alimentosViernes','alimentosSabado','alimentosDomingo'));
    }

    public function index()
    {
        
    }

    public function estadoAnimo()
    {
        
        return view('client.animo.form');
    }

    public function guardarEstadoAnimo(Request $request)
    {
        // dd($request);
        $user = User::find(Auth::id());
        $paciente = Paciente::where('user_id',$user->id)->first();
        $paciente->estados_animo()->create([
            "nombre"=>$request->estado_animo,
            "descripcion"=>$request->descripcion,
            "paciente_id"=>$paciente->id
        ]);
     
        return redirect()->route('cliente.dashboard');
    }

    public function misDietas()
    {
        // $user = User::find(Auth::id());
        // $dietas = Dieta::where('user_id',$user->id)->get();
        // return 1;
        $paciente = Paciente::where('user_id',auth::id())->first();
     
        $dietas = $paciente->dietas()->get();
        // dd($dietas,$paciente);
        return view('client.dietas.index',compact('dietas'));
    }


    public function principal()
    {
        $user = User::find(Auth::id());
        $paciente = Paciente::where('user_id',$user->id)->first();
        // dd($paciente);
        $datos = DatosAntropometrico::where('paciente_id',$paciente->id)->get();
         
        $dieta = $paciente->dietas()->latest()->first();
        return view('client.principal',compact('paciente','datos','dieta'));
    }

    public function dashboard(){
        $user = User::find(Auth::id());
        $paciente = Paciente::where('user_id',$user->id)->first();
        return view('client.dashboard',compact('paciente'));
    }


    
    public function miCuenta()
    {
     $user = User::find(Auth::id());
        $paciente = Paciente::where('user_id',$user->id)->first();
        // dd($paciente);
        return view('client.cuenta.cuenta',compact('paciente'));
    }

    public function formCuenta()
    {
        $user = User::find(Auth::id());
        $paciente = Paciente::where('user_id',$user->id)->first();
        return view('client.cuenta.editarCuenta',compact('paciente'));
    }

    public function updateCuenta(Request $request)
    {
        $hashpass = Hash::make($request->password);
        $user = User::find(Auth::id());
        if($request->password!=null)
            $user->update(["password"=>$hashpass]);

       $paciente = Paciente::where('user_id',$user->id)->first();
       $paciente->update([
        "nombre"=>$request->nombre,
        "apellido"=>$request->apellido,
        // "edad"=>$request->edad,
        "sexo"=>$request->sexo,
        "cedula"=>$request->cedula,
        "telefono"=>$request->telefono,
        // "tipo_diabetes"=>$request->tipo_diabetes,
       ]);

       if (request()->hasFile('imagen')) {
        $url="";
      $file = $request->imagen;
          $elemento= Cloudinary::upload($file->getRealPath(),['folder'=>'paciente']);
          $public_id = $elemento->getPublicId();
          $url = $elemento->getSecurePath();
    if(is_null($paciente->imagen)){
          $paciente->imagen()->create([
              'url'=>$url,
              'public_id'=>$public_id
              ]);
    }else{
          $pid = $paciente->imagen->public_id;
          Cloudinary::destroy($pid);//Eliminamos la imagen anterior de cloud
          $paciente->imagen()->update([
              'url'=>$url,
              'public_id'=>$public_id
              ]);
    }
    }
       return back();
        
    }
 
    public function create()
    {
        //
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

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
