<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nutricionista extends Authenticatable
{
    use HasFactory , HasRoles ;
    protected $guard_name = 'web';

    public $fillable = [
        "nombre",
        "apellido",
        "cedula",
        "sexo",
        "telefono",
        "especialidad",
        "user_id",
        "estado"

    ];
    // nutricionista->user->name
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function imagen(){
        return $this->morphOne(Imagen::class, 'imageable');
    }
}
