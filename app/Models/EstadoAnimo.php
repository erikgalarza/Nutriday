<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoAnimo extends Model
{
    use HasFactory;
    public $fillable=[
        "nombre","descripcion"
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
