<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaAlimento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaAlimentoSeeder extends Seeder
{
 
    public function run()
    {
        CategoriaAlimento::create(["nombre"=>"Platos preparados"]);
        CategoriaAlimento::create(["nombre"=>"Granos"]);
        CategoriaAlimento::create(["nombre"=>"Verduras"]);
        CategoriaAlimento::create(["nombre"=>"Frutas"]);
        CategoriaAlimento::create(["nombre"=>"Productos lácteos"]);
        CategoriaAlimento::create(["nombre"=>"Proteínas"]);
        CategoriaAlimento::create(["nombre"=>"Otros"]);
        
    }
}
