<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Actividad;
use Illuminate\Http\Request;
use App\Http\Requests\StoreActividadRequest;
use App\Http\Requests\StoreAsignacionActividad;
use App\Http\Requests\UpdateActividadRequest;
use App\Models\Paciente;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;

class ActividadController extends Controller
{

    public function verTodas()
    {
        $actividades = Actividad::all();
        return view('admin.actividades.index',compact('actividades'));
    }

    public function eliminarActividadAsignada($actividad_id,$paciente_id)
    {
        $actividad = Actividad::find($actividad_id);
        $actividad->paciente()->detach($paciente_id);
        return back();
    }

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

    return view('admin.actividades.pacientes',compact('pacientes'));
    }

    public function pacientes()
    {
        $pacientes = Paciente::all();
        // $duraciones=collect();
         dd($pacientes[2]);

        foreach($pacientes as $key => $paciente)
        {
            $duraciones = $paciente->actividades()->get(['duracion']);
            //dd($paciente->actividades()->get());
           $prioridad = $paciente->actividades()->get(['prioridad']);

           $user_id = $paciente->actividades()->get(['user_id']);

           if(count($user_id)>0){
              $user = User::find($user_id[$key]->user_id);
              if($user->nutricionistas!=null){
                $responsable = $user->nutricionistas->nombre;
                }else{$responsable = $user->administradores->nombre;}

                return view('admin.actividades.pacientes',compact('pacientes','duraciones','prioridad','responsable'));
            }

            return view('admin.actividades.pacientes',compact('pacientes','prioridad','duraciones'));
        }
    }

    public function guardarAsignacion(StoreAsignacionActividad $request)
    {

        $idResponsable = $request->idResponsable;
        $paciente = Paciente::find($request->paciente_id);
        foreach($request->actividad_id as $key => $actividad){
            // print_r($request->prioridad_id[$key]);
            $paciente->actividades()->attach($request->actividad_id[$key],['duracion'=>$request->duracion[$key],'user_id'=>Auth::id(),'prioridad'=>$request->prioridad_id[$key]]);
        }
        return redirect()->route('actividad.pacientes');
    }

    public function asignar($paciente_id)
    {
        $paciente_id = base64_decode($paciente_id);

        $paciente = Paciente::find($paciente_id);
        $actividadesReales = Actividad::all();
        // $collect = collect();
        $datos = $paciente->dato_antropometrico()->get();
        $actividades = $paciente->actividades()->get();
        // dd($actividades);
        foreach ($actividades as $key => $actividad){
            $duracion = $paciente->actividades()->get(['duracion']);
            $prioridad = $paciente->actividades()->get(['prioridad']);
            $user_id = $paciente->actividades()->get(['user_id']);
            // dd($user_id[$key]->user_id);
            $user = User::find($user_id[$key]->user_id);
            if($user->nutricionistas!=null){
            $responsable = $user->nutricionistas->nombre;
            }else{$responsable = $user->administradores->nombre;}
            // dd($duracion);
            $actividad->setAttribute('duracion',$duracion[$key]->duracion);
            $actividad->setAttribute('prioridad',$prioridad[$key]->prioridad);
            $actividad->setAttribute('responsable',$responsable);
        }

        // dd($actividades);
        $idResponsable = Auth::id();

        return view('admin.actividades.asignar',compact('paciente','actividades','actividadesReales','datos','idResponsable'));
    }

    public function index()
    {
        $actividades = Actividad::all();
        return view('admin.actividades.index',compact('actividades'));
    }

    public function actividadesByPaciente($paciente_id){
        $actividades = Actividad::where('paciente_id',$paciente_id)->get();
        return view('admin.actividades.actividadesByPaciente',compact('actividades'));
    }

    public function create()
    {
        return view('admin.actividades.create');
    }

    public function agregarActividad()
    {
        return view('admin.actividades.create');
    }


    public function store(StoreActividadRequest $request)
    {
        // validacion

        $actividad = Actividad::create([
            "nombre"=>$request->nombre,
            "descripcion"=>$request->descripcion,
        ]);

        if ($request->hasFile('imagen')) {

            $url = "";
            $file = $request->imagen;
            $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'actividad']);
            $public_id = $elemento->getPublicId();
            $url = $elemento->getSecurePath();
            $actividad->imagen()->create([
                "url" => $url,
                "public_id" => $public_id
            ]);
        }


        return redirect()->route('actividad.index');
    }




    public function update(UpdateActividadRequest $request, $id)
    {
        $actividad = Actividad::find($id);
        $actividad->update([
            "nombre"=>$request->nombre,
            "descripcion"=>$request->descripcion,
            "prioridad"=>$request->prioridad
        ]);

        $public_id = $actividad->imagen->public_id;
        $url=$actividad->imagen->url;

        if($request->hasFile('imagen'))
        {

            $file = $request->imagen;
            $elemento= Cloudinary::upload($file->getRealPath(),['folder'=>'actividad']);
            $public_id = $elemento->getPublicId();
            $url = $elemento->getSecurePath();
        }

  if(is_null($actividad->imagen)){
        $actividad->imagen()->create([
            'url'=>$url,
            'public_id'=>$public_id
            ]);
  }else{
      $pid = $actividad->imagen->public_id;
      if(isset($pid)){
          Cloudinary::destroy($pid);//Eliminamos la imagen anterior de cloud
          $actividad->imagen()->update([
              'url'=>$url,
              'public_id'=>$public_id
              ]);
      }

      $actividad->imagen()->update([
          'url'=>$url,
          'public_id'=>$public_id
          ]);
    }
    return back();
}


    public function destroy($id)
    {
        $actividad = Actividad::find($id);
        $imagen_id = $actividad->imagen->id;
        $public_id = $actividad->imagen->public_id;
        Imagen::destroy($imagen_id);//eliminamos el registro de la imagen que depende de la clase actividad
        Actividad::destroy($id); // eliminamos la actividad con sus datos, nombre, etc.
        if(isset($public_id)){
            Cloudinary::destroy($public_id); //eliminamos la imagen de la actividad de la nube
        }
        return back();
    }
}
