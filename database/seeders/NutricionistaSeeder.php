<?php

namespace Database\Seeders;

use App\Models\Nutricionista;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class NutricionistaSeeder extends Seeder
{
    
    public function run()
    {
        Role::create(["name"=>"Nutricionista"]); // este sera el nutricionista
        $user = Nutricionista::create([
            "nombre"=>"Pedro",
            "apellido"=>'Perez',
            "cedula"=>"2100463122",
            "telefono"=>"0988703012",
            "correo"=>'pedro@gmail.com',
            "especialidad"=>'Pediatra',
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m',//morales98 
        ]);
        $user->assignRole('Nutricionista');
    }
}
