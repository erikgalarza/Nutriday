<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Paciente extends Authenticatable
{
    use HasFactory , HasRoles;

    protected $guard_name = 'web';

    public $fillable=[
        "nombre",
        "apellido",
        "tipo_diabetes",
        "telefono",
        "sexo",
        "cedula",
        "edad",
        "user_id",
        "estado"
    ];

    public $timestamps = false;

    public function actividades() 
    {
        return $this->belongsToMany(Actividad::class);
    }

    public function estados_animo(){
        return $this->hasMany(EstadoAnimo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function imagen(){
        return $this->morphOne(Imagen::class, 'imageable');
    }

    public function dietas()
    {
        return $this->belongsToMany(Dieta::class);
    }

    public function dato_antropometrico()
    {
        return $this->hasMany(DatosAntropometrico::class);
    }
}
