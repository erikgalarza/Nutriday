<?php
namespace App\Http\Traits;

use App\Models\AlimentoComidaDia;
use App\Models\Comida;
use App\Models\Dieta_acd;

trait DiasTrait
 {
    public function leerLunes($lunes, $diaLunes, $dieta)
    {
        // dd($lunes);
        foreach($lunes as $alimento)
        {
            if($alimento->horario==0){//desayuno
                $desayuno = Comida::find(1);
                
                // $dca_id = $alimento->comidas()->attach($desayuno->id, ['dia_id'=>$diaLunes->id]);//
                $desayuno->alimentos()->attach($alimento->id,['dia_id'=>$diaLunes->id,'cantidad'=>$alimento->cantidad]);
                // dd($dca);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
                Dieta_acd::create([
                    "dieta_id"=>$dieta->id,
                    "acd_id" => $dca->id
                ]);
            }

            if($alimento->horario==1){//colacion de la mañana
                $colacionManana = Comida::find(2);
                $colacionManana->alimentos()->attach($alimento->id,['dia_id'=>$diaLunes->id,'cantidad'=>$alimento->cantidad]);
                  $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
                Dieta_acd::create([
                    "dieta_id"=>$dieta->id,
                    "acd_id" => $dca->id
                ]);
            }
            if($alimento->horario==2){
                $almuerzo = Comida::find(3);
               $almuerzo->alimentos()->attach($alimento->id,['dia_id'=>$diaLunes->id,'cantidad'=>$alimento->cantidad]);
                 $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
               Dieta_acd::create([
                    "dieta_id"=>$dieta->id,
                    "acd_id" => $dca->id
                ]);
            }
            if($alimento->horario==3){
                $colacionTarde = Comida::find(4);
               $colacionTarde->alimentos()->attach($alimento->id,['dia_id'=>$diaLunes->id,'cantidad'=>$alimento->cantidad]);
                 $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
               Dieta_acd::create([
                   "dieta_id"=>$dieta->id,
                   "acd_id" => $dca->id
               ]);
            }
            if($alimento->horario==4){//merienda
                $merienda = Comida::find(5);
               $merienda->alimentos()->attach($alimento->id,['dia_id'=>$diaLunes->id,'cantidad'=>$alimento->cantidad]);
                 $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
               Dieta_acd::create([
                   "dieta_id"=>$dieta->id,
                   "acd_id" => $dca->id
               ]);
            }

            if($alimento->horario==5){//cena
                $cena = Comida::find(6);
                $cena->alimentos()->attach($alimento->id,['dia_id'=>$diaLunes->id,'cantidad'=>$alimento->cantidad]);
                  $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
                Dieta_acd::create([
                    "dieta_id"=>$dieta->id,
                    "acd_id" => $dca->id
                ]);
            }
        }
    }

    public function leerMartes($martes, $diaMartes, $dieta)
    {
        foreach($martes as $alimento)
        {
            //RELACION DE ALIMENTO_COMIDA   BEGIN
            if($alimento->horario==6){//desayuno
                $desayuno = Comida::find(1);
                //RELACION COMIDA_DIA
                $desayuno->alimentos()->attach($alimento->id,['dia_id'=>$diaMartes->id,'cantidad'=>$alimento->cantidad]);
                // dd($dca);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
                // dd($dca->id);
                Dieta_acd::create([
                    "dieta_id"=>$dieta->id,
                    "acd_id" => $dca->id
                ]);
            }

            if($alimento->horario==7){//colacion de la mañana
                $colacionManana = Comida::find(2);
                //RELACION COMIDA_DIA
                   $colacionManana->alimentos()->attach($alimento->id,['dia_id'=>$diaMartes->id,'cantidad'=>$alimento->cantidad]);
                // dd($dca);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
                // dd($dca->id);
                Dieta_acd::create([
                    "dieta_id"=>$dieta->id,
                    "acd_id" => $dca->id
                ]);
            }
            if($alimento->horario==8){//almuerzo
                $almuerzo = Comida::find(3);
                //RELACION COMIDA_DIA
                $almuerzo->alimentos()->attach($alimento->id,['dia_id'=>$diaMartes->id,'cantidad'=>$alimento->cantidad]);
                // dd($dca);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
                // dd($dca->id);
                Dieta_acd::create([
                    "dieta_id"=>$dieta->id,
                    "acd_id" => $dca->id
                ]);
            }
            if($alimento->horario==9){//colacion de la tarde
                $colacionTarde = Comida::find(4);
                $colacionTarde->alimentos()->attach($alimento->id,['dia_id'=>$diaMartes->id,'cantidad'=>$alimento->cantidad]);
                // dd($dca);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
                // dd($dca->id);
                Dieta_acd::create([
                    "dieta_id"=>$dieta->id,
                    "acd_id" => $dca->id
                ]);
            }
            if($alimento->horario==10){//merienda
                $merienda = Comida::find(5);
                $merienda->alimentos()->attach($alimento->id,['dia_id'=>$diaMartes->id,'cantidad'=>$alimento->cantidad]);
                // dd($dca);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();

                // dd($dca->id);
                Dieta_acd::create([
                    "dieta_id"=>$dieta->id,
                    "acd_id" => $dca->id
                ]);
            }
            if($alimento->horario==11){//cena
                $cena = Comida::find(6);
                $cena->alimentos()->attach($alimento->id,['dia_id'=>$diaMartes->id,'cantidad'=>$alimento->cantidad]);
                // dd($dca);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
                // dd($dca->id);
                Dieta_acd::create([
                    "dieta_id"=>$dieta->id,
                    "acd_id" => $dca->id
                ]);
            }
            //RELACION ALIMENTO COMIDA END
        }
    }

    public function leerMiercoles($miercoles, $diaMiercoles, $dieta)
    {
        foreach($miercoles as $alimento)
        {
            //RELACION DE ALIMENTO_COMIDA   BEGIN
            if($alimento->horario==12){//desayuno
                $desayuno = Comida::find(1);
                $desayuno->alimentos()->attach($alimento->id,['dia_id'=>$diaMiercoles->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==13){//colacion de la mañana
                $colacionManana = Comida::find(2);
                $colacionManana->alimentos()->attach($alimento->id,['dia_id'=>$diaMiercoles->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==14){//almuerzo
                $almuerzo = Comida::find(3);
                $almuerzo->alimentos()->attach($alimento->id,['dia_id'=>$diaMiercoles->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==15){//colacion de la tarde
                $colacionTarde = Comida::find(4);
                $colacionTarde->alimentos()->attach($alimento->id,['dia_id'=>$diaMiercoles->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==16){//merienda
                $merienda = Comida::find(5);
                $merienda->alimentos()->attach($alimento->id,['dia_id'=>$diaMiercoles->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==17){//cena
                $cena = Comida::find(6);
                $cena->alimentos()->attach($alimento->id,['dia_id'=>$diaMiercoles->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            //RELACION ALIMENTO COMIDA END
        }
    }

    public function leerJueves($jueves, $diaJueves,$dieta)
    {
        foreach($jueves as $alimento)
        {
            //RELACION DE ALIMENTO_COMIDA   BEGIN
            if($alimento->horario==18){//desayuno
                $desayuno = Comida::find(1);
                $desayuno->alimentos()->attach($alimento->id,['dia_id'=>$diaJueves->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==19){//colacion de la mañana
                $colacionManana = Comida::find(2);
                $colacionManana->alimentos()->attach($alimento->id,['dia_id'=>$diaJueves->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==20){//almuerzo
                $almuerzo = Comida::find(3);
                $almuerzo->alimentos()->attach($alimento->id,['dia_id'=>$diaJueves->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==21){//colacion de la tarde
                $colacionTarde = Comida::find(4);
                $colacionTarde->alimentos()->attach($alimento->id,['dia_id'=>$diaJueves->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==22){//merienda
                $merienda = Comida::find(5);
                $merienda->alimentos()->attach($alimento->id,['dia_id'=>$diaJueves->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==23){//cena
                $cena = Comida::find(6);
                $cena->alimentos()->attach($alimento->id,['dia_id'=>$diaJueves->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            //RELACION ALIMENTO COMIDA END
        }
    }

    public function leerViernes($viernes, $diaViernes, $dieta)
    {
        foreach($viernes as $alimento)
        {
            //RELACION DE ALIMENTO_COMIDA   BEGIN
            if($alimento->horario==24){//desayuno
                $desayuno = Comida::find(1);
                $desayuno->alimentos()->attach($alimento->id,['dia_id'=>$diaViernes->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==25){//colacion de la mañana
                $colacionManana = Comida::find(2);
                $colacionManana->alimentos()->attach($alimento->id,['dia_id'=>$diaViernes->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==26){//almuerzo
                $almuerzo = Comida::find(3);
                $almuerzo->alimentos()->attach($alimento->id,['dia_id'=>$diaViernes->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==27){//colacion de la tarde
                $colacionTarde = Comida::find(4);
                $colacionTarde->alimentos()->attach($alimento->id,['dia_id'=>$diaViernes->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==28){//merienda
                $merienda = Comida::find(5);
                $merienda->alimentos()->attach($alimento->id,['dia_id'=>$diaViernes->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==29){//cena
                $cena = Comida::find(6);
                $cena->alimentos()->attach($alimento->id,['dia_id'=>$diaViernes->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            //RELACION ALIMENTO COMIDA END
        }
    }

    public function leerSabado($sabado, $diaSabado,$dieta)
    {
        foreach($sabado as $alimento)
        {
            //RELACION DE ALIMENTO_COMIDA   BEGIN
            if($alimento->horario==30){//desayuno
                $desayuno = Comida::find(1);
                $desayuno->alimentos()->attach($alimento->id,['dia_id'=>$diaSabado->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==31){//colacion de la mañana
                $colacionManana = Comida::find(2);
                $colacionManana->alimentos()->attach($alimento->id,['dia_id'=>$diaSabado->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==32){//almuerzo
                $almuerzo = Comida::find(3);
                $almuerzo->alimentos()->attach($alimento->id,['dia_id'=>$diaSabado->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==33){//colacion de la tarde
                $colacionTarde = Comida::find(4);
                $colacionTarde->alimentos()->attach($alimento->id,['dia_id'=>$diaSabado->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==34){//merienda
                $merienda = Comida::find(5);
                $merienda->alimentos()->attach($alimento->id,['dia_id'=>$diaSabado->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==35){//cena
                $cena = Comida::find(6);
                $cena->alimentos()->attach($alimento->id,['dia_id'=>$diaSabado->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            //RELACION ALIMENTO COMIDA END
        }
    }

    public function leerDomingo($domingo, $diaDomingo, $dieta)
    {
        foreach($domingo as $alimento)
        {
            //RELACION DE ALIMENTO_COMIDA   BEGIN
            if($alimento->horario==36){//desayuno
                $desayuno = Comida::find(1);
                $desayuno->alimentos()->attach($alimento->id,['dia_id'=>$diaDomingo->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==37){//colacion de la mañana
                $colacionManana = Comida::find(2);
                $colacionManana->alimentos()->attach($alimento->id,['dia_id'=>$diaDomingo->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==38){//almuerzo
                $almuerzo = Comida::find(3);
                $almuerzo->alimentos()->attach($alimento->id,['dia_id'=>$diaDomingo->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==39){//colacion de la tarde
                $colacionTarde = Comida::find(4);
                $colacionTarde->alimentos()->attach($alimento->id,['dia_id'=>$diaDomingo->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==40){//merienda
                $merienda = Comida::find(5);
                $merienda->alimentos()->attach($alimento->id,['dia_id'=>$diaDomingo->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            if($alimento->horario==41){//cena
                $cena = Comida::find(6);
                $cena->alimentos()->attach($alimento->id,['dia_id'=>$diaDomingo->id,'cantidad'=>$alimento->cantidad]);
                $dca = AlimentoComidaDia::orderBy('id','DESC')->take(1)->first();
              Dieta_acd::create([
                  "dieta_id"=>$dieta->id,
                  "acd_id" => $dca->id
              ]);
            }
            //RELACION ALIMENTO COMIDA END
        }
    }
}