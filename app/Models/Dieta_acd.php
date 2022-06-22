<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dieta_acd extends Model
{
    use HasFactory;

    public $primaryKey=["dieta_id","acd_id"];
}
