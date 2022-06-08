<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    use HasFactory;
    public $fillable = 
    [
        "id",
        "nombre",
        "tipo_diabetes",
        "fecha_fin",
        "imc"
        // "user_id"
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

    

    // public function alimentos()
    // {
    //     return $this->hasMany(Alimento::class);
    // }

}
