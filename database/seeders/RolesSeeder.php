<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\DatosAntropometrico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{

    public function run()
    {
        Role::create(["name"=>"Administrador"]);
        Role::create(["name"=>"Nutricionista"]); // este sera el nutricionista
        Role::create(["name"=>"Paciente"]); // este sera el cliente

        $user1 = User::create([
            "email"=>"erik@gmail.com",
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m'
        ]);
        $user1->assignRole('Administrador');
        $admin = $user1->administradores()->create([
            "nombre"=>"Erik Galarza",
            "cedula"=>"1718092065",
            "telefono"=>"0988703044"
        ]);
        

        $user2 = User::create([
            "email"=>"alvaro@gmail.com",
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m'
        ]);
        $user2->assignRole('Nutricionista');
        $nutri = $user2->nutricionistas()->create([
            "nombre"=>"Alvaro",
            "apellido"=>"Salazar",
            "cedula"=>"1234567890",
            "especialidad"=>"Terapeuta",
            "telefono"=>"0988703030",
        ]);
        // $nutri->assignRole('Nutricionista');


        $user3 = User::create([
            "email"=>"andres@gmail.com",
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m'
        ]);
        $user3->assignRole('Paciente');
        $paciente = $user3->pacientes()->create([
            "nombre"=>"Andres",
            "apellido"=>"Morales",
            "cedula"=>"1234567890",
            "sexo"=>1,
            "telefono"=>"0988703030",
            "tipo_diabetes"=>1,
            "edad"=>23
        ]);
        DatosAntropometrico::create([
            "altura"=>1.70,
            "peso"=>60,
            "imc"=>20,
            "paciente_id"=>$paciente->id
        ]);
    }
}
