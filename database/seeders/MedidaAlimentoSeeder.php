<?php

namespace Database\Seeders;

use App\Models\MedidaAlimento;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MedidaAlimentoSeeder extends Seeder
{
   
    public function run()
    {
        MedidaAlimento::create(["medida"=>"gramos"]);
        MedidaAlimento::create(["medida"=>"libras"]);
        MedidaAlimento::create(["medida"=>"kilogramos"]);
        MedidaAlimento::create(["medida"=>"mililitros"]);
        MedidaAlimento::create(["medida"=>"litros"]);

    }
}
