<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Paciente;
use App\Models\Nutricionista;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    protected $guard_name = 'web';

    public $fillable = [
        // 'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
   

    public function pacientes()
    {
        return $this->hasOne(Paciente::class);
    }

    public function administradores()
    {
        return $this->hasOne(Admin::class);
    }


    public function nutricionistas()
    {
        return $this->hasOne(Nutricionista::class);
    }
}
