<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AlimentoComidaDia extends Pivot
{
    protected $table = 'alimento_comida_dias';
    protected $fillable = [
        'alimento_id',
        'comida_id',
        'dia_id',
        'cantidad'
    ];

// ============== dieta_acd
    public function dieta()
    {
        return $this->belongsToMany(Dieta::class,'dietas','acd_id','dieta_id')->withTimestamps();
    }
}
