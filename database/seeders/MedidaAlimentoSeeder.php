<?php

namespace Database\Seeders;

use App\Models\MedidaAlimento;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MedidaAlimentoSeeder extends Seeder
{

    public function run()
    {
        MedidaAlimento::create(["medida"=>"gramos","abreviatura"=>"gr"]);
        MedidaAlimento::create(["medida"=>"libras","abreviatura"=>"lb"]);
        MedidaAlimento::create(["medida"=>"kilogramos","abreviatura"=>"kg"]);
        MedidaAlimento::create(["medida"=>"mililitros","abreviatura"=>"ml"]);
        MedidaAlimento::create(["medida"=>"litros","abreviatura"=>"lt"]);

    }
}
