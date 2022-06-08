<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Role::create(["name"=>"Administrador"]);

        $user1 = Admin::create([
            "email"=>'erick@gmail.com',
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m',//morales98
        ]);
        $user1->assignRole('Administrador');


         $user2 = Admin::create([
            "email"=>'alvaro@gmail.com',
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m',//morales98
        ]);
        $user2->assignRole('Administrador');

        $user3 = Admin::create([
            "email"=>'andres@gmail.com',
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m',//morales98
        ]);
        $user3->assignRole('Administrador');
    }
}
