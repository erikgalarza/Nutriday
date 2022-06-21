<?php

namespace App\Models;

use App\Events\EventoMensaje;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mensaje extends Model
{
    use HasFactory;
    public $fillable=[
        "nombres","correo","asunto","mensaje"
    ];

    public static function make_mensaje_notification($mensaje){
        event(new EventoMensaje($mensaje));
    }
}
