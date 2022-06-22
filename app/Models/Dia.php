<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;
    public $fillable=[
        "nombre",
        "alimento_id"
    ];
    // d_c_a
    public function comidas()
    {
        return $this->belongsToMany(Comida::class,'alimento_comida_dias')->withTimestamps()->withPivot('alimento_id');
    }

    public function alimentos()
    {
        return $this->belongsToMany(Alimento::class,'alimento_comida_dias')->withTimestamps()->withPivot('comida_id');
    }

    // fin d c a




    public function dietas()
    {
        return $this->belongsToMany(Dieta::class);
    }
}
