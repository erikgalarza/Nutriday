<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PacienteSeeder extends Seeder
{
  
    public function run()
    {
        Role::create(["name"=>"Paciente"]); // este sera el cliente
        $user5 = Paciente::create([
            "nombre"=>"Juan",
            "apellido"=>'Jose',
            "edad"=>23,
            "tipo_diabetes"=>1,
            "email"=>'juan@gmail.com',
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m',//morales98
            "telefono"=>"0988703034",
            "cedula"=>"2100463134",
        ]);
        $user5->assignRole('Paciente');
    }
}
