<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDietaAsignada;
use App\Http\Requests\StoreDietaFlash;
use Carbon\Carbon;
use App\Models\Dia;
use App\Models\Admin;
use App\Models\Dieta;
use App\Models\Alimento;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Nutricionista;
use App\Http\Traits\DiasTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDietaRequest;
use App\Http\Requests\UpdateDietaRequest;
use App\Http\Traits\AlimentosDieta;
use Alert;

class DietaController extends Controller
{



    public function editarAlimentosDietaPredefinida($dieta_id)
    {
        // $dieta_id = $
        $dieta = Dieta::find($dieta_id);
        $alimentos = Alimento::all();
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
 
             $semana = collect();
             $semana->push($alimentosLunes);
             $semana->push($alimentosMartes);
             $semana->push($alimentosMiercoles);
             $semana->push($alimentosJueves);
             $semana->push($alimentosViernes);
             $semana->push($alimentosSabado);
             $semana->push($alimentosDomingo);
            //  dd($semana);
 // dd($alimentosLunes,$alimentosMartes,$alimentosMiercoles,$alimentosJueves,$alimentosViernes, $alimentosSabado, $alimentosDomingo);

        return view('admin.dieta.editarReceta',compact('dieta','semana','alimentos'));
    }


    public function traerAlimentosDietaPredefinida(Request $request)
    {
        // dd($request);
        $dieta_id = $request->get('dieta_id');
        $diaSeleccionado = $request->get('diaSeleccionado');
        $dieta = Dieta::find($dieta_id);
        $combinaciones = $dieta->acds()->get();
        // dd($combinaciones);

        $dia = collect();
        $desayuno = collect(); $colacion1 = collect(); $almuerzo = collect(); $colacion2 = collect();
        $merienda = collect(); $cena = collect();
// ========================== LUNES ============================  //
        foreach($combinaciones as $combinacion)
        {
            if($diaSeleccionado==1)//lunes:1
            {
                if($combinacion->dia_id == 1 && $combinacion->comida_id==1)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $desayuno->push($alimento); $desayuno->put('imagen',$alimento->imagen->url);
                    $desayuno->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==2)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion1->push($alimento); $colacion1->put('imagen',$alimento->imagen->url); 
                    $colacion1->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                     
                    $almuerzo->push($alimento); $almuerzo->put('imagen',$alimento->imagen->url);
                    $almuerzo->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==4)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion2->push($alimento); $colacion2->put('imagen',$alimento->imagen->url);
                    $colacion2->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $merienda->push($alimento); $merienda->put('imagen',$alimento->imagen->url);
                    $merienda->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                     
                    $cena->push($alimento); $cena->put('imagen',$alimento->imagen->url); 
                    $cena->put('cantidad',$combinacion->cantidad);
                }
            }
            if($diaSeleccionado==2)//martes:2
            {
                if($combinacion->dia_id == 2 && $combinacion->comida_id==1)
                {
                    // dd($combinacion->alimento_id);
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $desayuno->push($alimento); $desayuno->put('imagen',$alimento->imagen->url);
                    $desayuno->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 2 && $combinacion->comida_id==2)
                {
                    
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $colacion1->push($alimento); $colacion1->put('imagen',$alimento->imagen->url); 
                    $colacion1->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 2 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $almuerzo->push($alimento); $almuerzo->put('imagen',$alimento->imagen->url);
                    $almuerzo->put('cantidad',$combinacion->cantidad);  
                }
                if($combinacion->dia_id == 2 && $combinacion->comida_id==4)
                {
                    $colacion2->push($alimento); $colacion2->put('imagen',$alimento->imagen->url);
                    $colacion2->put('cantidad',$combinacion->cantidad);   
                }
                if($combinacion->dia_id == 2 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $merienda->push($alimento); $merienda->put('imagen',$alimento->imagen->url);
                    $merienda->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 2 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $cena->push($alimento); $cena->put('imagen',$alimento->imagen->url); 
                    $cena->put('cantidad',$combinacion->cantidad);  
                }
            }
            if($diaSeleccionado==3)//miercoles:2
            {
                if($combinacion->dia_id == 3 && $combinacion->comida_id==1)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $desayuno->push($alimento); $desayuno->put('imagen',$alimento->imagen->url);
                    $desayuno->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 3 && $combinacion->comida_id==2)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $colacion1->push($alimento); $colacion1->put('imagen',$alimento->imagen->url); 
                    $colacion1->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 3 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $almuerzo->push($alimento); $almuerzo->put('imagen',$alimento->imagen->url);
                    $almuerzo->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 3 && $combinacion->comida_id==4)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion2->push($alimento); $colacion2->put('imagen',$alimento->imagen->url);
                    $colacion2->put('cantidad',$combinacion->cantidad);
                      
                }
                if($combinacion->dia_id == 3 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $merienda->push($alimento); $merienda->put('imagen',$alimento->imagen->url);
                    $merienda->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 3 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $cena->push($alimento); $cena->put('imagen',$alimento->imagen->url); 
                    $cena->put('cantidad',$combinacion->cantidad); 
                }
            }
            if($diaSeleccionado==4)//jueves:3
            {
                if($combinacion->dia_id == 4 && $combinacion->comida_id==1)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $desayuno->push($alimento); $desayuno->put('imagen',$alimento->imagen->url);
                    $desayuno->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 4 && $combinacion->comida_id==2)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $colacion1->push($alimento); $colacion1->put('imagen',$alimento->imagen->url); 
                    $colacion1->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 4 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $almuerzo->push($alimento); $almuerzo->put('imagen',$alimento->imagen->url);
                    $almuerzo->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 4 && $combinacion->comida_id==4)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion2->push($alimento); $colacion2->put('imagen',$alimento->imagen->url);
                    $colacion2->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 4 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $merienda->push($alimento); $merienda->put('imagen',$alimento->imagen->url);
                    $merienda->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 4 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $cena->push($alimento); $cena->put('imagen',$alimento->imagen->url); 
                    $cena->put('cantidad',$combinacion->cantidad); 
                }
            }
            if($diaSeleccionado==5)//viernes:4
            {
                if($combinacion->dia_id == 5 && $combinacion->comida_id==1)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $desayuno->push($alimento); $desayuno->put('imagen',$alimento->imagen->url);
                    $desayuno->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 5 && $combinacion->comida_id==2)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $colacion1->push($alimento); $colacion1->put('imagen',$alimento->imagen->url); 
                    $colacion1->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 5 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $almuerzo->push($alimento); $almuerzo->put('imagen',$alimento->imagen->url);
                    $almuerzo->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 5 && $combinacion->comida_id==4)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion2->push($alimento); $colacion2->put('imagen',$alimento->imagen->url);
                    $colacion2->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 5 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $merienda->push($alimento); $merienda->put('imagen',$alimento->imagen->url);
                    $merienda->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 5 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $cena->push($alimento); $cena->put('imagen',$alimento->imagen->url); 
                    $cena->put('cantidad',$combinacion->cantidad); 
                }
            }
            if($diaSeleccionado==6)//sabado:1
            {
                if($combinacion->dia_id == 6 && $combinacion->comida_id==1)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $desayuno->push($alimento); $desayuno->put('imagen',$alimento->imagen->url);
                    $desayuno->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 6 && $combinacion->comida_id==2)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $colacion1->push($alimento); $colacion1->put('imagen',$alimento->imagen->url); 
                    $colacion1->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 6 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $almuerzo->push($alimento); $almuerzo->put('imagen',$alimento->imagen->url);
                    $almuerzo->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 6 && $combinacion->comida_id==4)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion2->push($alimento); $colacion2->put('imagen',$alimento->imagen->url);
                    $colacion2->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 6 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $merienda->push($alimento); $merienda->put('imagen',$alimento->imagen->url);
                    $merienda->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 6 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $cena->push($alimento); $cena->put('imagen',$alimento->imagen->url); 
                    $cena->put('cantidad',$combinacion->cantidad); 
                }
            }
            if($diaSeleccionado==7)//domingo:1
            {
                if($combinacion->dia_id == 7 && $combinacion->comida_id==1)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $desayuno->push($alimento); $desayuno->put('imagen',$alimento->imagen->url);
                    $desayuno->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 7 && $combinacion->comida_id==2)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $colacion1->push($alimento); $colacion1->put('imagen',$alimento->imagen->url); 
                    $colacion1->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 7 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $almuerzo->push($alimento); $almuerzo->put('imagen',$alimento->imagen->url);
                    $almuerzo->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 7 && $combinacion->comida_id==4)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion2->push($alimento); $colacion2->put('imagen',$alimento->imagen->url);
                    $colacion2->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 7 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $merienda->push($alimento); $merienda->put('imagen',$alimento->imagen->url);
                    $merienda->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 7 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                     
                    $cena->push($alimento); $cena->put('imagen',$alimento->imagen->url); 
                    $cena->put('cantidad',$combinacion->cantidad); 
                }
            }
        }
        $dia->push($desayuno,$colacion1,$almuerzo,$colacion2,$merienda,$cena);
        // dd($dia);
        return json_encode($dia);

    }

    public function crearDieta(Request $request)
    {
        // dd($request);
        $dieta = Dieta::create([
            "nombre"=>$request->nombre,
            "observaciones"=>$request->observaciones,
            "imc"=>$request->imc,
            "tipo_diabetes"=>$request->tipo_diabetes
        ]);

        $semana = json_decode($request->semanaNueva);
        // dd($semana);
        $lunes = $semana->alimentosLunes;//tienes los alimentos del lunes
        $martes = $semana->alimentosMartes;//tienes los alimentos del lunes
        $miercoles = $semana->alimentosMiercoles;//tienes los alimentos del lunes
        $jueves = $semana->alimentosJueves;//tienes los alimentos del lunes
        $viernes = $semana->alimentosViernes;//tienes los alimentos del lunes
        $sabado = $semana->alimentosSabado;//tienes los alimentos del lunes
        $domingo = $semana->alimentosDomingo;//tienes los alimentos del lunes

        $diaLunes = Dia::find(1);//lunes
        $diaMartes = Dia::find(2);//lunes
        $diaMiercoles = Dia::find(3);//lunes
        $diaJueves = Dia::find(4);//lunes
        $diaViernes = Dia::find(5);//lunes
        $diaSabado = Dia::find(6);//lunes
        $diaDomingo = Dia::find(7);//lunes
// RELACION DE ALIMENTO COMIDA Y LA RELACION DE COMIDA_DIA
        $this->leerLunes($lunes, $diaLunes,$dieta);
        $this->leerMartes($martes, $diaMartes,$dieta);
        $this->leerMiercoles($miercoles, $diaMiercoles,$dieta);
        $this->leerJueves($jueves, $diaJueves,$dieta);
        $this->leerViernes($viernes, $diaViernes,$dieta);
        $this->leerSabado($sabado, $diaSabado,$dieta);
        $this->leerDomingo($domingo, $diaDomingo,$dieta);

        Alert::toast('Dieta creada', 'success');
        return redirect()->route('dieta.index');
    }

    public function guardarDietaNueva(Request $request)
    {
       
        $semana = json_decode($request->semana);
        $dieta_id = $request->get('dieta_id');
        $dieta = Dieta::find($dieta_id);
        $dieta->acds()->detach();

        $lunes = $semana->alimentosLunes;//tienes los alimentos del lunes
        $martes = $semana->alimentosMartes;//tienes los alimentos del lunes
        $miercoles = $semana->alimentosMiercoles;//tienes los alimentos del lunes
        $jueves = $semana->alimentosJueves;//tienes los alimentos del lunes
        $viernes = $semana->alimentosViernes;//tienes los alimentos del lunes
        $sabado = $semana->alimentosSabado;//tienes los alimentos del lunes
        $domingo = $semana->alimentosDomingo;//tienes los alimentos del lunes

        $diaLunes = Dia::find(1);//lunes
        $diaMartes = Dia::find(2);//lunes
        $diaMiercoles = Dia::find(3);//lunes
        $diaJueves = Dia::find(4);//lunes
        $diaViernes = Dia::find(5);//lunes
        $diaSabado = Dia::find(6);//lunes
        $diaDomingo = Dia::find(7);//lunes

        // dd($lunes,$martes,$miercoles,$jueves,$viernes, $sabado,$domingo);
        $this->leerLunes($lunes, $diaLunes,$dieta);
        $this->leerMartes($martes, $diaMartes,$dieta);
        $this->leerMiercoles($miercoles, $diaMiercoles,$dieta);
        $this->leerJueves($jueves, $diaJueves,$dieta);
        $this->leerViernes($viernes, $diaViernes,$dieta);
        $this->leerSabado($sabado, $diaSabado,$dieta);
        $this->leerDomingo($domingo, $diaDomingo,$dieta);

        return true;
    }

    public function cargarAlimentos(Request $request)
    {
     
        $dieta_id = $request->get('dieta_id');
        $dieta = Dieta::find($dieta_id);
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
 
             $semana = collect();
             $semana->push($alimentosLunes);
             $semana->push($alimentosMartes);
             $semana->push($alimentosMiercoles);
             $semana->push($alimentosJueves);
             $semana->push($alimentosViernes);
             $semana->push($alimentosSabado);
             $semana->push($alimentosDomingo);
             dd($semana);
 // dd($alimentosLunes,$alimentosMartes,$alimentosMiercoles,$alimentosJueves,$alimentosViernes, $alimentosSabado, $alimentosDomingo);
 return 0;
    }

    public function editarAlimentosDieta($dieta_id)
    {
        // $dieta_id = $
        $dieta = Dieta::find($dieta_id);
        $alimentos = Alimento::all();
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
 
             $semana = collect();
             $semana->push($alimentosLunes);
             $semana->push($alimentosMartes);
             $semana->push($alimentosMiercoles);
             $semana->push($alimentosJueves);
             $semana->push($alimentosViernes);
             $semana->push($alimentosSabado);
             $semana->push($alimentosDomingo);
            //  dd($semana);
 // dd($alimentosLunes,$alimentosMartes,$alimentosMiercoles,$alimentosJueves,$alimentosViernes, $alimentosSabado, $alimentosDomingo);

        return view('admin.dieta.editarReceta',compact('dieta','semana','alimentos'));
    }

use AlimentosDieta;
    public function traerAlimentos(Request $request)
    {
        $paciente_id = $request->get('paciente_id');
        $dieta_id = $request->get('dieta_id');
        $diaSeleccionado = $request->get('diaSeleccionado');
        $dieta = Dieta::find($dieta_id);
        $combinaciones = $dieta->acds()->get();

        $dia = collect();
        $desayuno = collect(); $colacion1 = collect(); $almuerzo = collect(); $colacion2 = collect();
        $merienda = collect(); $cena = collect();
// ========================== LUNES ============================  //
        foreach($combinaciones as $combinacion)
        {
            if($diaSeleccionado==1)//lunes:1
            {
                if($combinacion->dia_id == 1 && $combinacion->comida_id==1)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $desayuno->push($alimento); $desayuno->put('imagen',$alimento->imagen->url);
                    $desayuno->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==2)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion1->push($alimento); $colacion1->put('imagen',$alimento->imagen->url); 
                    $colacion1->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                     
                    $almuerzo->push($alimento); $almuerzo->put('imagen',$alimento->imagen->url);
                    $almuerzo->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==4)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion2->push($alimento); $colacion2->put('imagen',$alimento->imagen->url);
                    $colacion2->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $merienda->push($alimento); $merienda->put('imagen',$alimento->imagen->url);
                    $merienda->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                     
                    $cena->push($alimento); $cena->put('imagen',$alimento->imagen->url); 
                    $cena->put('cantidad',$combinacion->cantidad);
                }
            }
            if($diaSeleccionado==2)//martes:2
            {
                if($combinacion->dia_id == 2 && $combinacion->comida_id==1)
                {
                    // dd($combinacion->alimento_id);
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $desayuno->push($alimento); $desayuno->put('imagen',$alimento->imagen->url);
                    $desayuno->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 2 && $combinacion->comida_id==2)
                {
                    
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $colacion1->push($alimento); $colacion1->put('imagen',$alimento->imagen->url); 
                    $colacion1->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 2 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $almuerzo->push($alimento); $almuerzo->put('imagen',$alimento->imagen->url);
                    $almuerzo->put('cantidad',$combinacion->cantidad);  
                }
                if($combinacion->dia_id == 2 && $combinacion->comida_id==4)
                {
                    $colacion2->push($alimento); $colacion2->put('imagen',$alimento->imagen->url);
                    $colacion2->put('cantidad',$combinacion->cantidad);   
                }
                if($combinacion->dia_id == 2 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $merienda->push($alimento); $merienda->put('imagen',$alimento->imagen->url);
                    $merienda->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 2 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $cena->push($alimento); $cena->put('imagen',$alimento->imagen->url); 
                    $cena->put('cantidad',$combinacion->cantidad);  
                }
            }
            if($diaSeleccionado==3)//miercoles:2
            {
                if($combinacion->dia_id == 3 && $combinacion->comida_id==1)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $desayuno->push($alimento); $desayuno->put('imagen',$alimento->imagen->url);
                    $desayuno->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 3 && $combinacion->comida_id==2)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $colacion1->push($alimento); $colacion1->put('imagen',$alimento->imagen->url); 
                    $colacion1->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 3 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $almuerzo->push($alimento); $almuerzo->put('imagen',$alimento->imagen->url);
                    $almuerzo->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 3 && $combinacion->comida_id==4)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion2->push($alimento); $colacion2->put('imagen',$alimento->imagen->url);
                    $colacion2->put('cantidad',$combinacion->cantidad);
                      
                }
                if($combinacion->dia_id == 3 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $merienda->push($alimento); $merienda->put('imagen',$alimento->imagen->url);
                    $merienda->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 3 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $cena->push($alimento); $cena->put('imagen',$alimento->imagen->url); 
                    $cena->put('cantidad',$combinacion->cantidad); 
                }
            }
            if($diaSeleccionado==4)//jueves:3
            {
                if($combinacion->dia_id == 4 && $combinacion->comida_id==1)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $desayuno->push($alimento); $desayuno->put('imagen',$alimento->imagen->url);
                    $desayuno->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 4 && $combinacion->comida_id==2)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $colacion1->push($alimento); $colacion1->put('imagen',$alimento->imagen->url); 
                    $colacion1->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 4 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $almuerzo->push($alimento); $almuerzo->put('imagen',$alimento->imagen->url);
                    $almuerzo->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 4 && $combinacion->comida_id==4)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion2->push($alimento); $colacion2->put('imagen',$alimento->imagen->url);
                    $colacion2->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 4 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $merienda->push($alimento); $merienda->put('imagen',$alimento->imagen->url);
                    $merienda->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 4 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $cena->push($alimento); $cena->put('imagen',$alimento->imagen->url); 
                    $cena->put('cantidad',$combinacion->cantidad); 
                }
            }
            if($diaSeleccionado==5)//viernes:4
            {
                if($combinacion->dia_id == 5 && $combinacion->comida_id==1)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $desayuno->push($alimento); $desayuno->put('imagen',$alimento->imagen->url);
                    $desayuno->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 5 && $combinacion->comida_id==2)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $colacion1->push($alimento); $colacion1->put('imagen',$alimento->imagen->url); 
                    $colacion1->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 5 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $almuerzo->push($alimento); $almuerzo->put('imagen',$alimento->imagen->url);
                    $almuerzo->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 5 && $combinacion->comida_id==4)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion2->push($alimento); $colacion2->put('imagen',$alimento->imagen->url);
                    $colacion2->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 5 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $merienda->push($alimento); $merienda->put('imagen',$alimento->imagen->url);
                    $merienda->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 5 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $cena->push($alimento); $cena->put('imagen',$alimento->imagen->url); 
                    $cena->put('cantidad',$combinacion->cantidad); 
                }
            }
            if($diaSeleccionado==6)//sabado:1
            {
                if($combinacion->dia_id == 6 && $combinacion->comida_id==1)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $desayuno->push($alimento); $desayuno->put('imagen',$alimento->imagen->url);
                    $desayuno->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 6 && $combinacion->comida_id==2)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $colacion1->push($alimento); $colacion1->put('imagen',$alimento->imagen->url); 
                    $colacion1->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 6 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $almuerzo->push($alimento); $almuerzo->put('imagen',$alimento->imagen->url);
                    $almuerzo->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 6 && $combinacion->comida_id==4)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion2->push($alimento); $colacion2->put('imagen',$alimento->imagen->url);
                    $colacion2->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 6 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $merienda->push($alimento); $merienda->put('imagen',$alimento->imagen->url);
                    $merienda->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 6 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $cena->push($alimento); $cena->put('imagen',$alimento->imagen->url); 
                    $cena->put('cantidad',$combinacion->cantidad); 
                }
            }
            if($diaSeleccionado==7)//domingo:1
            {
                if($combinacion->dia_id == 7 && $combinacion->comida_id==1)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $desayuno->push($alimento); $desayuno->put('imagen',$alimento->imagen->url);
                    $desayuno->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 7 && $combinacion->comida_id==2)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $colacion1->push($alimento); $colacion1->put('imagen',$alimento->imagen->url); 
                    $colacion1->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 7 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $almuerzo->push($alimento); $almuerzo->put('imagen',$alimento->imagen->url);
                    $almuerzo->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 7 && $combinacion->comida_id==4)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion2->push($alimento); $colacion2->put('imagen',$alimento->imagen->url);
                    $colacion2->put('cantidad',$combinacion->cantidad); 
                }
                if($combinacion->dia_id == 7 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);

                    $merienda->push($alimento); $merienda->put('imagen',$alimento->imagen->url);
                    $merienda->put('cantidad',$combinacion->cantidad);
                }
                if($combinacion->dia_id == 7 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                     
                    $cena->push($alimento); $cena->put('imagen',$alimento->imagen->url); 
                    $cena->put('cantidad',$combinacion->cantidad); 
                }
            }
        }
        $dia->push($desayuno,$colacion1,$almuerzo,$colacion2,$merienda,$cena);
        return json_encode($dia);
    }

    public function dietasByPaciente($paciente_id)
    {
        $paciente = Paciente::find($paciente_id);
        $datos = $paciente->dato_antropometrico()->get();
        $dietas = $paciente->dietas()->get();
        $fechasFinDieta = collect();
        $fechasFinAsignacion = collect();
        foreach ($dietas as $key => $dieta)
        {
            $fechas_fin = $paciente->dietas()->get(['fecha_fin']);
            $fechas_asignacion = $paciente->dietas()->get(['fecha_asignacion']);

            $fecha_fin = $fechas_fin[$key]->fecha_fin;
            $fecha_asignacion = $fechas_asignacion[$key]->fecha_asignacion;

            $fechasFinDieta->push($fecha_fin);
            $fechasFinAsignacion->push($fecha_asignacion);
        }

        $dietasDisponibles = Dieta::all();
        return view('admin.dieta.dietasByPaciente',compact('paciente','fechasFinDieta','fechasFinAsignacion','dietas','dietasDisponibles','datos'));
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
          $semana = json_decode($request->semana);
        // dd($semana);
        $dieta_id = $request->dieta_id;
        $dieta = Dieta::find($dieta_id);
        $paciente_id = $request->paciente_id;
        $user_id = $request->user_id;

        $lunes = $semana->alimentosLunes;//tienes los alimentos del lunes
        $martes = $semana->alimentosMartes;//tienes los alimentos del lunes
        $miercoles = $semana->alimentosMiercoles;//tienes los alimentos del lunes
        $jueves = $semana->alimentosJueves;//tienes los alimentos del lunes
        $viernes = $semana->alimentosViernes;//tienes los alimentos del lunes
        $sabado = $semana->alimentosSabado;//tienes los alimentos del lunes
        $domingo = $semana->alimentosDomingo;//tienes los alimentos del lunes

        $diaLunes = Dia::find(1);//lunes
        $diaMartes = Dia::find(2);//lunes
        $diaMiercoles = Dia::find(3);//lunes
        $diaJueves = Dia::find(4);//lunes
        $diaViernes = Dia::find(5);//lunes
        $diaSabado = Dia::find(6);//lunes
        $diaDomingo = Dia::find(7);//lunes
// RELACION DE ALIMENTO COMIDA Y LA RELACION DE COMIDA_DIA
        $this->leerLunes($lunes, $diaLunes,$dieta);
        $this->leerMartes($martes, $diaMartes,$dieta);
        $this->leerMiercoles($miercoles, $diaMiercoles,$dieta);
        $this->leerJueves($jueves, $diaJueves,$dieta);
        $this->leerViernes($viernes, $diaViernes,$dieta);
        $this->leerSabado($sabado, $diaSabado,$dieta);
        $this->leerDomingo($domingo, $diaDomingo,$dieta);
        // $martes = $semana->martes;
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
        $dieta->pacientes()->attach($paciente->id, ['fecha_fin'=>$request->fecha_fin,'fecha_asignacion'=>Carbon::now(),'user_id'=>Auth::id()]);
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
        // dd($request);
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
            // dd($paciente);
            $dieta->pacientes()->attach($paciente['id'],["fecha_asignacion"=>Carbon::now(),"fecha_fin"=>$fecha,'user_id'=>Auth::id()]);
            $pac =  Paciente::find($paciente['id']);
            $dieta = $pac->dietas()->latest()->first();//ultima dieta
            // dd($dieta);
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
        $dieta = Dieta::find($id);
        // dd($nutri);
        if($dieta->estado=="activa")
        {
            $dieta->update([
                "estado"=>"inactiva"
            ]);
        }else{
            $dieta->update([
                "estado"=>"activa"
            ]);
        }
        return back();

    //   Dieta::destroy($id);
    //     return back();
    }
}
