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
    ];

    public function dieta_acd()
    {
        return $this->belongsToMany(Dieta_acd::class,'dieta_adc');
    }
}
