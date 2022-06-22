<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Actividad;
use Illuminate\Http\Request;
use App\Http\Requests\StoreActividadRequest;
use App\Http\Requests\StoreAsignacionActividad;
use App\Http\Requests\UpdateActividadRequest;
use App\Models\Paciente;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ActividadController extends Controller
{
    public function pacientes()
    {
        $pacientes = Paciente::all();

        // $duraciones=collect();
        foreach($pacientes as $paciente)
        {
           $duraciones = $paciente->actividades()->get(['duracion']);
        //    dd($duracion);
        }

        return view('admin.actividades.pacientes',compact('pacientes','duraciones'));
    }

    public function guardarAsignacion(StoreAsignacionActividad $request)
    {
// dd($request);
        $paciente = Paciente::find($request->paciente_id);
        foreach($request->actividad_id as $key => $actividad){
            $actividadBuscada = Actividad::find($actividad);
            $actividadBuscada->update([
                "prioridad"=>$request->prioridad_id[$key]
            ]);
            $paciente->actividades()->attach($request->actividad_id[$key],['duracion'=>$request->duracion[$key]]);
        }
        return redirect()->route('actividad.pacientes');
    }

    public function asignar($paciente_id)
    {

        $paciente = Paciente::find($paciente_id);
        $datos = $paciente->dato_antropometrico()->get();
        $actividades = Actividad::all();

        return view('admin.actividades.asignar',compact('paciente','actividades','datos'));
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


    public function store(StoreActividadRequest $request)
    {
        // validacion

        $actividad = Actividad::create([
            "nombre"=>$request->nombre,
            "descripcion"=>$request->descripcion,
            // "prioridad"=>$request->prioridad
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
