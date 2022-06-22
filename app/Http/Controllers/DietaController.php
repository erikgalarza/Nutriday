<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDietaAsignada;
use App\Http\Requests\StoreDietaFlash;
use Carbon\Carbon;
use App\Models\Dia;
use App\Models\Admin;
use App\Models\Dieta;
use App\Models\Comida;
use App\Models\Alimento;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Nutricionista;
use App\Http\Traits\DiasTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDietaRequest;
use App\Http\Requests\UpdateDietaRequest;

class DietaController extends Controller
{


    public function traerAlimentos(Request $request)
    {
        // dd($request);
        $paciente_id = $request->get('paciente_id');
        $dieta_id = $request->get('dieta_id');
        $diaSeleccionado = $request->get('diaSeleccionado');
        $paciente = Paciente::find($paciente_id);
        $dieta = $paciente->dietas()->where('dieta_id',$dieta_id)->latest()->latest()->first();
        // dd($dieta);
    
        $res =$dieta->dias['0'];// lunes
   
        $x = $res->comidas['0']->alimentos()->where('dia_id',1)->get();
        // dd($x);

        $dias = $dieta->dias()->get();

        //0 LUnes 
        // 1 martes
        $allComidas = $dias['1']->comidas()->get();
        // dd($allComidas);
        dd($allComidas[1]->alimentos()->get());
        dd($allComidas['1']->alimentos()->where('comida_id',2)->get());
   
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
        if($key == 0 && $diaSeleccionado==$key)//lunes
        {
            $alimentosLunes = collect();
            foreach($dia->comidas()->get() as $horario){//cada comida
                foreach($horario->alimentos()->where('dia_id',1)->get() as $alimento){
                    dd($horario->alimentos()->where('dia_id',1)->get());
                    $cantidad = $horario->alimentos()->where('dia_id',1)->get(['cantidad']); 

            $alimentosLunes->push(['alimento'=>$alimento,'cantidad'=>$cantidad[0]->cantidad,'horario'=>$horario->nombre,'imagen'=>$alimento->imagen->url]);
                }
            }
        }

        if($key == 1 && $diaSeleccionado==$key)//martes
        {
            $alimentosMartes = collect();
            foreach($dia->comidas()->get() as $horario){
                foreach($horario->alimentos()->where('dia_id',2)->get() as $alimento){
                    $cantidad = $horario->alimentos()->where('dia_id',2)->get(['cantidad']); 
            $alimentosMartes->push(['alimento'=>$alimento,'cantidad'=>$cantidad[0]->cantidad,'horario'=>$horario->nombre,'imagen'=>$alimento->imagen->url]);
                }
            }
        }
        if($key == 2 && $diaSeleccionado==$key)//miercoles
        {
            $alimentosMiercoles = collect();
            foreach($dia->comidas()->get() as $horario){
                foreach($horario->alimentos()->where('dia_id',3)->get() as $alimento){
                    $cantidad = $horario->alimentos()->where('dia_id',3)->get(['cantidad']); 
            $alimentosMiercoles->push(['alimento'=>$alimento,'cantidad'=>$cantidad[0]->cantidad,'horario'=>$horario->nombre,'imagen'=>$alimento->imagen->url]);
                }
            }
        }
        if($key == 3 && $diaSeleccionado==$key)//jueves
        {
            $alimentosJueves = collect();
            foreach($dia->comidas()->get() as $horario){
                foreach($horario->alimentos()->where('dia_id',4)->get() as $alimento){
                    $cantidad = $horario->alimentos()->where('dia_id',4)->get(['cantidad']); 
            $alimentosJueves->push(['alimento'=>$alimento,'cantidad'=>$cantidad[0]->cantidad,'horario'=>$horario->nombre,'imagen'=>$alimento->imagen->url]);
                }
            }
        }

        if($key == 4 && $diaSeleccionado==$key)//viernes
        {
            $alimentosViernes = collect();
            foreach($dia->comidas()->get() as $horario){
                foreach($horario->alimentos()->where('dia_id',5)->get() as $alimento){
                    $cantidad = $horario->alimentos()->where('dia_id',5)->get(['cantidad']); 
            $alimentosViernes->push(['alimento'=>$alimento,'cantidad'=>$cantidad[0]->cantidad,'horario'=>$horario->nombre,'imagen'=>$alimento->imagen->url]);
                }
            }
        }

        if($key == 5 && $diaSeleccionado==$key)//sabado
        {
            $alimentosSabado = collect();
            foreach($dia->comidas()->get() as $horario){
                foreach($horario->alimentos()->where('dia_id',6)->get() as $alimento){
                    $cantidad = $horario->alimentos()->where('dia_id',6)->get(['cantidad']); 
            $alimentosSabado->push(['alimento'=>$alimento,'cantidad'=>$cantidad[0]->cantidad,'horario'=>$horario->nombre,'imagen'=>$alimento->imagen->url]);
                }
            }
        }

        if($key == 6 && $diaSeleccionado==$key)//domingo
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

    if($diaSeleccionado==0)
    {
        return $alimentosLunes;
    }
    if($diaSeleccionado==1)
    {
        return $alimentosMartes;
    }
    if($diaSeleccionado==2)
    {
        return $alimentosMiercoles;
    }
    if($diaSeleccionado==3)
    {
        return $alimentosJueves;
    }
    if($diaSeleccionado==4)
    {
        return $alimentosViernes;
    }
    if($diaSeleccionado==5)
    {
        return $alimentosSabado;
    }
    if($diaSeleccionado==6)
    {
        return $alimentosDomingo;
    }

        return 0;
    //   $semana = collect();
    //   $semana->push($alimentosLunes,$alimentosMartes,$alimentosMiercoles,$alimentosJueves,$alimentosViernes, $alimentosSabado, $alimentosDomingo);
    //   dd($semana);
    //  dd($alimentosLunes,$alimentosMartes,$alimentosMiercoles,$alimentosJueves,$alimentosViernes, $alimentosSabado, $alimentosDomingo);
        // return $semana;
    }
    // public function traerAlimentos(Request $request)
    // {
    //     $paciente_id = $request->get('pacienteid');
    //     $dieta_id = $request->get('dietaid');
    //     $paciente = Paciente::find($paciente_id);
    //     $dieta = $paciente->dietas()->get([$dieta_id]);

    //     return $dieta;
    // }

    public function dietasByPaciente($paciente_id)
    {
        $paciente = Paciente::find($paciente_id);
        $datos = $paciente->dato_antropometrico()->get();
        $dietas = $paciente->dietas()->get();
        $dietasDisponibles = Dieta::all();
        return view('admin.dieta.dietasByPaciente',compact('paciente','dietas','dietasDisponibles','datos'));
    }

    public function buscarPacientes(Request $request)
    {
        $nombre = $request->get('paciente');
        $pacientes = Paciente::where('nombre','like','%'.$nombre.'%')->get();
       $dietas = Dieta::all();
        return view('admin.dieta.asignar',compact('pacientes','dietas'));
    }

    public function index()
    {
        $dietas = Dieta::all();
        $pacientes = Paciente::all();
        // dd($dietas[0]->pacientes()->get());
        $dietas_predefinidas = collect();
        $dietas_asignadas = collect();
        $pacientesc = collect();
        foreach($pacientes as $paciente)
        {
           $pacientesc->push($paciente);
        }
        // dd($pacientesc[0]->dietas()->get());
                foreach($dietas as $dieta)
                {
            if($dieta->imc>=1 && $dieta->imc<=4){
                $dietas_predefinidas->push($dieta);
            }else
                $dietas_asignadas->push($dieta);
        }
       return view('admin.dieta.index',compact('dietas_predefinidas','pacientesc'));
    }
    use DiasTrait;// trait: se usan para reutilizar metodos de una clase
    public function guardarDieta(Request $request)
    {
        // dd($request);
        $semana = json_decode($request->semana);
        // dd($semana);
        $dieta_id = $request->dieta_id;
        $paciente_id = $request->paciente_id;
        $user_id = $request->user_id;



        $lunes = $semana->lunes;//tienes los alimentos del lunes
        $martes = $semana->martes;
        $miercoles = $semana->miercoles;
        $jueves = $semana->jueves;
        $viernes = $semana->viernes;
        $sabado = $semana->sabado;
        $domingo = $semana->domingo;

        $diaLunes = Dia::find(1);//lunes
        $diaMartes = Dia::find(2);//Martes
        $diaMiercoles = Dia::find(3);//Miercoles
        $diaJueves = Dia::find(4);//Jueves
        $diaViernes = Dia::find(5);//Viernes
        $diaSabado = Dia::find(6);//Sabado
        $diaDomingo = Dia::find(7);//Domingo
// RELACION DE ALIMENTO COMIDA Y LA RELACION DE COMIDA_DIA
        $this->leerLunes($lunes, $diaLunes);
        $this->leerMartes($martes, $diaMartes);
        $this->leerMiercoles($miercoles, $diaMiercoles);
        $this->leerJueves($jueves, $diaJueves);
        $this->leerViernes($viernes, $diaViernes);
        $this->leerSabado($sabado, $diaSabado);
        $this->leerDomingo($domingo, $diaDomingo);

        //RELACION DE DIETA CON DIA
        $dieta = Dieta::find($dieta_id);
        for($i = 1; $i<=7 ; $i++){
            $dieta->dias()->attach($i);
        }

        $dieta->pacientes()->attach($paciente_id,['user_id'=>$user_id]);

        return true;
    }

    public function crearDietaFlash(Request $request){
        $paciente_id = $request->paciente_id;
        $paciente = Paciente::find($paciente_id);
        $datoAntropometrico = $paciente->dato_antropometrico()->latest()->first();
        $imc = $datoAntropometrico->imc;
        return view('admin.dieta.create',compact('imc','paciente'));
    }

    public function guardarDietaAsignada(StoreDietaAsignada $request)
    {

        // $dieta = Dieta::find($request->dieta_id);
        $paciente = Paciente::find($request->paciente_id);
        $dieta = Dieta::find($request->dieta_id);
        $dieta->pacientes()->attach($paciente->id, ['created_at'=>$request->fecha_fin]);
        // $dieta->update([
        //     "fecha_fin"=>$request->fecha_fin
        // ]);


        return back();
        // $alimento->dietas()->attach($dieta->id);

    }

    public function asignarDieta()
    {
        $pacientes = Paciente::all();

        $dietas = Dieta::all();

        return view('admin.dieta.asignar',compact('pacientes','dietas'));
    }

    public function create()
    {
        $alimentos = Alimento::all();
        return view('admin.dieta.create');
    }


    public function store(Request $request)
    {
        
        // $campos = [
        //     "nombre"=>"required|string|min:3|max:30",
        //     "tipo_diabetes"=>"required|integer",
        //     "fecha_fin"=>"required|date",
        //     "observaciones"=>"nullable|string|max:500",
        // ];

        // $mensaje = [
        //     'required' => ':attribute es requerido',
        //     'nombre.max' => 'El nombre no debe sobrepasar los 30 caracteres',
        //     'descripcion.max' => 'La descripcion no debe sobrepasar los 256 caracteres',
        //     'imagen.required' => 'La imagen es requerida',
        //     'imagen.mimes' => 'La imagen debe ser jpg, png o jpeg',
        //     'imagen.max' => 'La imagen es muy pesada',
        //     'descripcion.required' => 'La descripción es requerida',
        // ];

        // $this->validate($request, $campos);
        // dd("hola");
        // $pacienteNuevo = json_decode($request->paciente);
        // $paciente = collect($pacienteNuevo);
        // dd($request);
        $fecha= $request->fecha_fin;
        $dieta = Dieta::create([
            "nombre"=>$request->nombre,
            "tipo_diabetes"=>$request->tipo_diabetes,
            "imc"=>$request->imc,
            "observaciones"=>$request->observaciones
        ]);


        $imc = $request->imc;

        $alimentos = Alimento::all();
        if($request->paciente){
            $pacienteNuevo = json_decode($request->paciente);
            $paciente = collect($pacienteNuevo);
            $paciente = Paciente::find($paciente['id']);
            $datos = $paciente->dato_antropometrico()->get();

            $dieta->pacientes()->attach($paciente['id'],["created_at"=>$fecha]);
            $pac =  Paciente::find($paciente['id']);
            $dieta = $pac->dietas()->latest()->first();//ultima dieta
            $dieta->update(["estado"=>"activa"]);
            $dietas = $pac->dietas()->get();
            $longitudDietas = count($dietas);
            foreach($dietas as $key => $dieta){
                if(($longitudDietas-2) == $key){
                    $dieta->update(["estado"=>"inactiva"]);//inactivamos la penultima dieta más reciente
                }
            }
            return view('admin.alimentos.create',compact('alimentos','dieta','imc','paciente','datos'));
        }

        return view('admin.alimentos.create',compact('alimentos','dieta','imc'));
    }


    public function show(Dieta $dieta)
    {
        //
    }

    public function edit(Dieta $dieta)
    {
        //
    }

    public function eliminarDieta($id){
        Dieta::destroy($id);
        return back();
    }


    public function update(UpdateDietaRequest $request, $id)
    {
        $dieta = Dieta::find($id);

        $dieta->update([
            "nombre"=>$request->nombre,
            "tipo_diabetes"=>$request->tipo_diabetes,
            "imc"=>$request->imc,
            "observaciones"=>$request->observaciones,
        ]);

        return back();
    }

    public function destroy($id)
    {
      Dieta::destroy($id);
        return back();
    }
}
