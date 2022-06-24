<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    // use HasFactory;
    public $fillable = 
    [
        "id",
        "nombre",
        "tipo_diabetes",
        "fecha_fin",
        "imc",
        "estado",
        "observaciones"
    ];

    public function alimentos()
    {
        return $this->belongsToMany(Alimento::class);
    }

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class);
    }

    public function dias()
    {
        return $this->belongsToMany(Dia::class);
    }

    // public function dieta_acd()
    // {
    //     return $this->belongsToMany(Dieta_acd::class,'dieta_acds');
    // }

     // =========================== dieta_alimento_comida_dia
     public function acds()
     {
         return $this->belongsToMany(AlimentoComidaDia::class,'dieta_acds','dieta_id','acd_id')->withTimestamps();
     }

    

    // public function alimentos()
    // {
    //     return $this->hasMany(Alimento::class);
    // }

}
