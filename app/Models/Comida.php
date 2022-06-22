<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    use HasFactory;
    public $fillable=[
        "nombre"
    ];

    public function alimentos()
    {
        return $this->belongsToMany(Alimento::class,'alimento_comida_dias')->withTimestamps()->withPivot('dia_id');
    }

    public function dias()
    {
        return $this->belongsToMany(Dia::class,'alimento_comida_dias')->withTimestamps()->withPivot('alimento_id');
    }

}
