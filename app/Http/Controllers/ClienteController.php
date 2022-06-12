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
       $dieta =  Dieta::find($dieta_id);
       
       $dias = $dieta->dias()->get();
    //    dd($dias[0]->comidas()->get());
    //    foreach($dias[0]->comidas()->get() as $horario)
    //    {
    //    }

       $alimentosLunes = collect();
       $alimentosMartes = collect();
       $alimentosMiercoles = collect();
       $alimentosJueves = collect();
       $alimentosViernes = collect();
       $alimentosViernes = collect();
       $alimentosSabado = collect();
       $alimentosDomingo = collect();

    foreach($dias as $key => $dia)
    {
        if($key == 0)//lunes
        {
            $alimentosLunes = collect();
            foreach($dia->comidas()->get() as $horario){
                foreach($horario->alimentos()->where('dia_id',1)->get() as $alimento){
                    $cantidad = $horario->alimentos()->where('dia_id',1)->get(['cantidad']); 

            $alimentosLunes->push(['alimento'=>$alimento,'cantidad'=>$cantidad[0]->cantidad,'horario'=>$horario->nombre,'imagen'=>$alimento->imagen->url]);
                }
            }
        }

        if($key == 1)//martes
        {
            $alimentosMartes = collect();
            foreach($dia->comidas()->get() as $horario){
                foreach($horario->alimentos()->where('dia_id',2)->get() as $alimento){
                    $cantidad = $horario->alimentos()->where('dia_id',2)->get(['cantidad']); 
            $alimentosMartes->push(['alimento'=>$alimento,'cantidad'=>$cantidad[0]->cantidad,'horario'=>$horario->nombre,'imagen'=>$alimento->imagen->url]);
                }
            }
        }
        if($key == 2)//miercoles
        {
            $alimentosMiercoles = collect();
            foreach($dia->comidas()->get() as $horario){
                foreach($horario->alimentos()->where('dia_id',3)->get() as $alimento){
                    $cantidad = $horario->alimentos()->where('dia_id',3)->get(['cantidad']); 
            $alimentosMiercoles->push(['alimento'=>$alimento,'cantidad'=>$cantidad[0]->cantidad,'horario'=>$horario->nombre,'imagen'=>$alimento->imagen->url]);
                }
            }
        }
        if($key == 3)//jueves
        {
            $alimentosJueves = collect();
            foreach($dia->comidas()->get() as $horario){
                foreach($horario->alimentos()->where('dia_id',4)->get() as $alimento){
                    $cantidad = $horario->alimentos()->where('dia_id',4)->get(['cantidad']); 
            $alimentosJueves->push(['alimento'=>$alimento,'cantidad'=>$cantidad[0]->cantidad,'horario'=>$horario->nombre,'imagen'=>$alimento->imagen->url]);
                }
            }
        }

        if($key == 4)//viernes
        {
            $alimentosViernes = collect();
            foreach($dia->comidas()->get() as $horario){
                foreach($horario->alimentos()->where('dia_id',5)->get() as $alimento){
                    $cantidad = $horario->alimentos()->where('dia_id',5)->get(['cantidad']); 
            $alimentosViernes->push(['alimento'=>$alimento,'cantidad'=>$cantidad[0]->cantidad,'horario'=>$horario->nombre,'imagen'=>$alimento->imagen->url]);
                }
            }
        }

        if($key == 5)//sabado
        {
            $alimentosSabado = collect();
            foreach($dia->comidas()->get() as $horario){
                foreach($horario->alimentos()->where('dia_id',6)->get() as $alimento){
                    $cantidad = $horario->alimentos()->where('dia_id',6)->get(['cantidad']); 
            $alimentosSabado->push(['alimento'=>$alimento,'cantidad'=>$cantidad[0]->cantidad,'horario'=>$horario->nombre,'imagen'=>$alimento->imagen->url]);
                }
            }
        }

        if($key == 6)//domingo
        {
            $alimentosDomingo = collect();
            foreach($dia->comidas()->get() as $horario){
                foreach($horario->alimentos()->where('dia_id',7)->get() as $alimento){
                    $cantidad = $horario->alimentos()->where('dia_id',7)->get(['cantidad']); 
            $alimentosDomingo->push(['alimento'=>$alimento,'cantidad'=>$cantidad[0]->cantidad,'horario'=>$horario->nombre,'imagen'=>$alimento->imagen->url]);
                }
            }
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
        $datos = DatosAntropometrico::where('paciente_id',$paciente->id)->get(); 
        return view('client.principal',compact('paciente','datos'));
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
        "edad"=>$request->edad,
        "cedula"=>$request->cedula,
        "telefono"=>$request->telefono,
        "tipo_diabetes"=>$request->tipo_diabetes,
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
