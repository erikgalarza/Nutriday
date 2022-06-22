<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    use HasFactory;

    public $fillable = [
        "nombre",
        "peso",
        "valor_calorico",
        "carbohidrato",
        "proteina",
        "grasa",
        "categoria_id",
        "medida_id"
    ];

    public function imagen(){
        return $this->morphOne(Imagen::class, 'imageable');
    }

    public function dietas()
    {
        return $this->belongsToMany(Dieta::class);
    }

    // =========================== d c a 
    public function comidas()
    {
        return $this->belongsToMany(Comida::class);
    }

    public function dias()
    {
        return $this->belongsToMany(Dia::class);
    }

//==========================================0


    public function categoria()
    {
        return $this->belongsTo(CategoriaAlimento::class);
    }

    public function medida()
    {
        return $this->belongsTo(MedidaAlimento::class);
    }

    // public function dieta(){
    //     return $this->belongsTo(Dieta::class);
    // }
}
