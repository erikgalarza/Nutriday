<?php

namespace App\Http\Controllers;

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
        $paciente_id = $request->get('pacienteid');
        dd($paciente_id);
        $dieta_id = $request->get('dietaid');
        $paciente = Paciente::find($paciente_id);
        $dieta = $paciente->dietas()->get([$dieta_id]);
        
        return $dieta;
    }

    public function dietasByPaciente($paciente_id)
    {
        $paciente = Paciente::find($paciente_id);
        $dietas = $paciente->dietas()->get();
        $dietasDisponibles = Dieta::all();
        return view('admin.dieta.dietasByPaciente',compact('paciente','dietas','dietasDisponibles'));
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
        $semana = $request->semana;
        // dd($semana);
        $dieta_id = $request->dieta_id;
        $paciente_id = $request->paciente_id;
        $user_id = $request->user_id;
        
       

        $lunes = $semana['lunes'];//tienes los alimentos del lunes
        $martes = $semana['martes'];
        $miercoles = $semana['miercoles'];
        $jueves = $semana['jueves'];
        $viernes = $semana['viernes'];
        $sabado = $semana['sabado'];
        $domingo = $semana['domingo'];
        
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
       
        $imc = $request->imc;
        $paciente_id = $request->paciente_id;
        $paciente = Paciente::find($paciente_id);
        return view('admin.dieta.create',compact('imc','paciente'));
    }

    public function guardarDietaAsignada(Request $request)
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
            return view('admin.alimentos.create',compact('alimentos','dieta','imc','paciente'));
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

  
    public function update(Request $request, $id)
    {

        //validacion campos no null

        $dieta = Dieta::find($id);
        
        $dieta->update([
            "nombre"=>$request->nombre,
            "tipo_diabetes"=>$request->tipo_diabetes,
            "imc"=>$request->imc,
            "observaciones"=>$request->observaciones,

            // "fecha_fin"=>$request->fecha_fin,
        ]);
        return back();
    }

    public function destroy($id)
    {
      Dieta::destroy($id);
        return back();
    }
}
