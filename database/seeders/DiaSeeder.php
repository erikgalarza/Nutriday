<?php

namespace Database\Seeders;

use App\Models\Dia;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dia::create(["nombre"=>"Lunes"]);
        Dia::create(["nombre"=>"Martes"]);
        Dia::create(["nombre"=>"Miercoles"]);
        Dia::create(["nombre"=>"Jueves"]);
        Dia::create(["nombre"=>"Viernes"]);
        Dia::create(["nombre"=>"Sabado"]);
        Dia::create(["nombre"=>"Domingo"]);
    }
}
