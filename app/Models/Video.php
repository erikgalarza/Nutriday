<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public $fillable=[
        "titulo","categoria","descripcion","url"
    ];

    // public function imagen(){
    //     return $this->morphOne(Imagen::class, 'imageable');
    // }
}
