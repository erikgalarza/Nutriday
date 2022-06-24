<?php
namespace App\Http\Traits;

use App\Models\Comida;
use App\Models\Alimento;
use App\Models\Dieta_acd;
use App\Models\AlimentoComidaDia;

trait AlimentosDieta
 {
    public function alimentosLunes($combinacion)
    {
        $lunes = collect();
        $desayuno = collect(); $colacion1 = collect(); $almuerzo = collect(); $colacion2 = collect();
        $merienda = collect(); $cena = collect();

                if($combinacion->dia_id == 1 && $combinacion->comida_id==1)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $desayuno->push($alimento); 
                    // dd($desayuno);
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==2)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion1->push($alimento); 
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==3)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $almuerzo->push($alimento); 
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==4)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $colacion2->push($alimento); 
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==5)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $merienda->push($alimento); 
                }
                if($combinacion->dia_id == 1 && $combinacion->comida_id==6)
                {
                    $alimento = Alimento::find($combinacion->alimento_id);
                    $cena->push($alimento); 
                }
                $lunes->push($desayuno,$colacion1,$almuerzo,$colacion2,$merienda,$cena);
                return $lunes;
    }

}