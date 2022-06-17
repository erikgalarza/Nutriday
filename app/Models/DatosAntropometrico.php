<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosAntropometrico extends Model
{
    use HasFactory;

    public $fillable = [
        "altura",
        "peso",
        "imc",
        "paciente_id",
        "grasa_corporal",
        "masa_muscular",
        "observaciones"
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
    public function imagen(){
        return $this->morphOne(Imagen::class, 'imageable');
    }

}
