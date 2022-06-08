<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;
    public $fillable=[
        "nombre","cedula","telefono"
    ];
   
    protected $guard_name = 'web';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
