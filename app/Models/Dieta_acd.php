<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Dieta_acd extends Pivot
{
    use HasFactory;
    protected $table = 'dieta_acds';
    public $fillable=[
        "dieta_id",
        "acd_id",
    ];
    // public $primaryKey=["dieta_id","acd_id"]; no funciona
    // public function alimento_comida_dias()
    // {
    //     return $this->belongsToMany(AlimentoComidaDia::class,'alimento_comida_dias');
    // }

    // public function dieta()
    // {
    //     return $this->belongsToMany(Dieta::class,'dietas');
    // }
}
