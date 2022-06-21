<?php
namespace App\Http\Traits;

use App\Models\Comida;

trait DiasTrait
 {
    public function leerLunes($lunes, $diaLunes)
    {
        foreach($lunes as $alimento)
        {
            //RELACION DE ALIMENTO_COMIDA   BEGIN
            if($alimento['horario']==0){//desayuno
                $desayuno = Comida::find(1);
                //RELACION COMIDA_DIA
                $diaLunes->comidas()->attach($desayuno->id);
                $desayuno->alimentos()->attach($alimento['id'],['dia_id'=>1,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==1){//colacion de la mañana
                $colacionManana = Comida::find(2);
                //RELACION COMIDA_DIA
                $diaLunes->comidas()->attach($colacionManana->id);
                $colacionManana->alimentos()->attach($alimento['id'],['dia_id'=>1,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==2){//almuerzo
                $almuerzo = Comida::find(3);
                //RELACION COMIDA_DIA
                $diaLunes->comidas()->attach($almuerzo->id);
                $almuerzo->alimentos()->attach($alimento['id'],['dia_id'=>1,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==3){//colacion de la tarde
                $colacionTarde = Comida::find(4);
                //RELACION COMIDA_DIA
                $diaLunes->comidas()->attach($colacionTarde->id);
                $colacionTarde->alimentos()->attach($alimento['id'],['dia_id'=>1,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==4){//merienda
                $merienda = Comida::find(5);
                //RELACION COMIDA_DIA
                $diaLunes->comidas()->attach($merienda->id);
                $merienda->alimentos()->attach($alimento['id'],['dia_id'=>1,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==5){//cena
                $cena = Comida::find(6);
                //RELACION COMIDA_DIA
                $diaLunes->comidas()->attach($cena->id);
                $cena->alimentos()->attach($alimento['id'],['dia_id'=>1,'cantidad'=>$alimento['cantidad']]);
            }
            //RELACION ALIMENTO COMIDA END
        }
    }

    public function leerMartes($martes, $diaMartes)
    {
        foreach($martes as $alimento)
        {
            //RELACION DE ALIMENTO_COMIDA   BEGIN
            if($alimento['horario']==6){//desayuno
                $desayuno = Comida::find(1);
                //RELACION COMIDA_DIA
                $diaMartes->comidas()->attach($desayuno->id);
                $desayuno->alimentos()->attach($alimento['id'],['dia_id'=>2,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==7){//colacion de la mañana
                $colacionManana = Comida::find(2);
                //RELACION COMIDA_DIA
                $diaMartes->comidas()->attach($colacionManana->id);
                $colacionManana->alimentos()->attach($alimento['id'],['dia_id'=>2,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==8){//almuerzo
                $almuerzo = Comida::find(3);
                //RELACION COMIDA_DIA
                $diaMartes->comidas()->attach($almuerzo->id);
                $almuerzo->alimentos()->attach($alimento['id'],['dia_id'=>2,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==9){//colacion de la tarde
                $colacionTarde = Comida::find(4);
                //RELACION COMIDA_DIA
                $diaMartes->comidas()->attach($colacionTarde->id);
                $colacionTarde->alimentos()->attach($alimento['id'],['dia_id'=>2,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==10){//merienda
                $merienda = Comida::find(5);
                //RELACION COMIDA_DIA
                $diaMartes->comidas()->attach($merienda->id);
                $merienda->alimentos()->attach($alimento['id'],['dia_id'=>2,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==11){//cena
                $cena = Comida::find(6);
                //RELACION COMIDA_DIA
                $diaMartes->comidas()->attach($cena->id);
                $cena->alimentos()->attach($alimento['id'],['dia_id'=>2,'cantidad'=>$alimento['cantidad']]);
            }
            //RELACION ALIMENTO COMIDA END
        }
    }

    public function leerMiercoles($miercoles, $diaMiercoles)
    {
        foreach($miercoles as $alimento)
        {
            //RELACION DE ALIMENTO_COMIDA   BEGIN
            if($alimento['horario']==12){//desayuno
                $desayuno = Comida::find(1);
                //RELACION COMIDA_DIA
                $diaMiercoles->comidas()->attach($desayuno->id);
                $desayuno->alimentos()->attach($alimento['id'],['dia_id'=>3,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==13){//colacion de la mañana
                $colacionManana = Comida::find(2);
                //RELACION COMIDA_DIA
                $diaMiercoles->comidas()->attach($colacionManana->id);
                $colacionManana->alimentos()->attach($alimento['id'],['dia_id'=>3,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==14){//almuerzo
                $almuerzo = Comida::find(3);
                //RELACION COMIDA_DIA
                $diaMiercoles->comidas()->attach($almuerzo->id);
                $almuerzo->alimentos()->attach($alimento['id'],['dia_id'=>3,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==15){//colacion de la tarde
                $colacionTarde = Comida::find(4);
                //RELACION COMIDA_DIA
                $diaMiercoles->comidas()->attach($colacionTarde->id);
                $colacionTarde->alimentos()->attach($alimento['id'],['dia_id'=>3,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==16){//merienda
                $merienda = Comida::find(5);
                //RELACION COMIDA_DIA
                $diaMiercoles->comidas()->attach($merienda->id);
                $merienda->alimentos()->attach($alimento['id'],['dia_id'=>3,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==17){//cena
                $cena = Comida::find(6);
                //RELACION COMIDA_DIA
                $diaMiercoles->comidas()->attach($cena->id);
                $cena->alimentos()->attach($alimento['id'],['dia_id'=>3,'cantidad'=>$alimento['cantidad']]);
            }
            //RELACION ALIMENTO COMIDA END
        }
    }

    public function leerJueves($jueves, $diaJueves)
    {
        foreach($jueves as $alimento)
        {
            //RELACION DE ALIMENTO_COMIDA   BEGIN
            if($alimento['horario']==18){//desayuno
                $desayuno = Comida::find(1);
                //RELACION COMIDA_DIA
                $diaJueves->comidas()->attach($desayuno->id);
                $desayuno->alimentos()->attach($alimento['id'],['dia_id'=>4,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==19){//colacion de la mañana
                $colacionManana = Comida::find(2);
                //RELACION COMIDA_DIA
                $diaJueves->comidas()->attach($colacionManana->id);
                $colacionManana->alimentos()->attach($alimento['id'],['dia_id'=>4,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==20){//almuerzo
                $almuerzo = Comida::find(3);
                //RELACION COMIDA_DIA
                $diaJueves->comidas()->attach($almuerzo->id);
                $almuerzo->alimentos()->attach($alimento['id'],['dia_id'=>4,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==21){//colacion de la tarde
                $colacionTarde = Comida::find(4);
                //RELACION COMIDA_DIA
                $diaJueves->comidas()->attach($colacionTarde->id);
                $colacionTarde->alimentos()->attach($alimento['id'],['dia_id'=>4,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==22){//merienda
                $merienda = Comida::find(5);
                //RELACION COMIDA_DIA
                $diaJueves->comidas()->attach($merienda->id);
                $merienda->alimentos()->attach($alimento['id'],['dia_id'=>4,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==23){//cena
                $cena = Comida::find(6);
                //RELACION COMIDA_DIA
                $diaJueves->comidas()->attach($cena->id);
                $cena->alimentos()->attach($alimento['id'],['dia_id'=>4,'cantidad'=>$alimento['cantidad']]);
            }
            //RELACION ALIMENTO COMIDA END
        }
    }

    public function leerViernes($viernes, $diaViernes)
    {
        foreach($viernes as $alimento)
        {
            //RELACION DE ALIMENTO_COMIDA   BEGIN
            if($alimento['horario']==24){//desayuno
                $desayuno = Comida::find(1);
                //RELACION COMIDA_DIA
                $diaViernes->comidas()->attach($desayuno->id);
                $desayuno->alimentos()->attach($alimento['id'],['dia_id'=>5,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==25){//colacion de la mañana
                $colacionManana = Comida::find(2);
                //RELACION COMIDA_DIA
                $diaViernes->comidas()->attach($colacionManana->id);
                $colacionManana->alimentos()->attach($alimento['id'],['dia_id'=>5,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==26){//almuerzo
                $almuerzo = Comida::find(3);
                //RELACION COMIDA_DIA
                $diaViernes->comidas()->attach($almuerzo->id);
                $almuerzo->alimentos()->attach($alimento['id'],['dia_id'=>5,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==27){//colacion de la tarde
                $colacionTarde = Comida::find(4);
                //RELACION COMIDA_DIA
                $diaViernes->comidas()->attach($colacionTarde->id);
                $colacionTarde->alimentos()->attach($alimento['id'],['dia_id'=>5,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==28){//merienda
                $merienda = Comida::find(5);
                //RELACION COMIDA_DIA
                $diaViernes->comidas()->attach($merienda->id);
                $merienda->alimentos()->attach($alimento['id'],['dia_id'=>5,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==29){//cena
                $cena = Comida::find(6);
                //RELACION COMIDA_DIA
                $diaViernes->comidas()->attach($cena->id);
                $cena->alimentos()->attach($alimento['id'],['dia_id'=>5,'cantidad'=>$alimento['cantidad']]);
            }
            //RELACION ALIMENTO COMIDA END
        }
    }

    public function leerSabado($sabado, $diaSabado)
    {
        foreach($sabado as $alimento)
        {
            //RELACION DE ALIMENTO_COMIDA   BEGIN
            if($alimento['horario']==30){//desayuno
                $desayuno = Comida::find(1);
                //RELACION COMIDA_DIA
                $diaSabado->comidas()->attach($desayuno->id);
                $desayuno->alimentos()->attach($alimento['id'],['dia_id'=>6,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==31){//colacion de la mañana
                $colacionManana = Comida::find(2);
                //RELACION COMIDA_DIA
                $diaSabado->comidas()->attach($colacionManana->id);
                $colacionManana->alimentos()->attach($alimento['id'],['dia_id'=>6,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==32){//almuerzo
                $almuerzo = Comida::find(3);
                //RELACION COMIDA_DIA
                $diaSabado->comidas()->attach($almuerzo->id);
                $almuerzo->alimentos()->attach($alimento['id'],['dia_id'=>6,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==33){//colacion de la tarde
                $colacionTarde = Comida::find(4);
                //RELACION COMIDA_DIA
                $diaSabado->comidas()->attach($colacionTarde->id);
                $colacionTarde->alimentos()->attach($alimento['id'],['dia_id'=>6,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==34){//merienda
                $merienda = Comida::find(5);
                //RELACION COMIDA_DIA
                $diaSabado->comidas()->attach($merienda->id);
                $merienda->alimentos()->attach($alimento['id'],['dia_id'=>6,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==35){//cena
                $cena = Comida::find(6);
                //RELACION COMIDA_DIA
                $diaSabado->comidas()->attach($cena->id);
                $cena->alimentos()->attach($alimento['id'],['dia_id'=>6,'cantidad'=>$alimento['cantidad']]);
            }
            //RELACION ALIMENTO COMIDA END
        }
    }

    public function leerDomingo($domingo, $diaDomingo)
    {
        foreach($domingo as $alimento)
        {
            //RELACION DE ALIMENTO_COMIDA   BEGIN
            if($alimento['horario']==36){//desayuno
                $desayuno = Comida::find(1);
                //RELACION COMIDA_DIA
                $diaDomingo->comidas()->attach($desayuno->id);
                $desayuno->alimentos()->attach($alimento['id'],['dia_id'=>7,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==37){//colacion de la mañana
                $colacionManana = Comida::find(2);
                //RELACION COMIDA_DIA
                $diaDomingo->comidas()->attach($colacionManana->id);
                $colacionManana->alimentos()->attach($alimento['id'],['dia_id'=>7,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==38){//almuerzo
                $almuerzo = Comida::find(3);
                //RELACION COMIDA_DIA
                $diaDomingo->comidas()->attach($almuerzo->id);
                $almuerzo->alimentos()->attach($alimento['id'],['dia_id'=>7,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==39){//colacion de la tarde
                $colacionTarde = Comida::find(4);
                //RELACION COMIDA_DIA
                $diaDomingo->comidas()->attach($colacionTarde->id);
                $colacionTarde->alimentos()->attach($alimento['id'],['dia_id'=>7,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==40){//merienda
                $merienda = Comida::find(5);
                //RELACION COMIDA_DIA
                $diaDomingo->comidas()->attach($merienda->id);
                $merienda->alimentos()->attach($alimento['id'],['dia_id'=>7,'cantidad'=>$alimento['cantidad']]);
            }
            if($alimento['horario']==41){//cena
                $cena = Comida::find(6);
                //RELACION COMIDA_DIA
                $diaDomingo->comidas()->attach($cena->id);
                $cena->alimentos()->attach($alimento['id'],['dia_id'=>7,'cantidad'=>$alimento['cantidad']]);
            }
            //RELACION ALIMENTO COMIDA END
        }
    }
}