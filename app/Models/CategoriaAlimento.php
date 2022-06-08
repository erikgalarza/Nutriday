<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoriaAlimento extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function alimentos()
    {
        return $this->hasMany(Alimento::class);
    }
}
