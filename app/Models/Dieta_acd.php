<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dieta_acd extends Model
{
    use HasFactory;
    public $fillable=[
        "dieta_id",
        "acd_id",
    ];
    // public $primaryKey=["dieta_id","acd_id"]; no funciona
    public function alimento_comida_dias()
    {
        return $this->belongsToMany(AlimentoComidaDia::class,'alimento_comida_dias');
    }
}
