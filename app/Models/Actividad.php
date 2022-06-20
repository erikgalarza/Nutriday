<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    public $fillable=[
        "nombre",
        "descripcion",
        "prioridad"
    ];

    public function paciente()
    {
        return $this->belongsToMany(Paciente::class);
    }

    public function imagen()
    {
        return $this->morphOne(Imagen::class, 'imageable');
    }
}
