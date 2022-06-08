<?php

namespace Database\Seeders;

use App\Models\Comida;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comida::create(["nombre"=>"Desayuno"]);
        Comida::create(["nombre"=>"Colacion de la mañana"]);
        Comida::create(["nombre"=>"Almuerzo"]);
        Comida::create(["nombre"=>"Colación de la tarde"]);
        Comida::create(["nombre"=>"Merienda"]);
        Comida::create(["nombre"=>"Cena"]);
    }
}
