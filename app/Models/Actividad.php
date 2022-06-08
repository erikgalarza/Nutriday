<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    public $fillable=[
        "nombre",
        "duracion",
        "descripcion"
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function imagen()
    {
        return $this->morphOne(Imagen::class, 'imageable');
    }
}
