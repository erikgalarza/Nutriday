<?php

namespace Database\Seeders;

use App\Models\Alimento;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alimento1 = Alimento::create([
            "nombre"=>"Pera",
            "peso" =>20,
            "valor_calorico" =>40,
            "carbohidrato" =>50,
            "proteina" => 100,
            "grasa" =>10,
            "categoria_id" =>4,
            "medida_id" =>1,
        ]);
        $alimento1->imagen()->create([
            "public_id"=>"alimentoSeeder/rogngoxsbz8zjaplityq",
            "url"=>"https://res.cloudinary.com/dkzs70zvl/image/upload/v1655660339/alimentoSeeder/rogngoxsbz8zjaplityq.png"
        ]);


        $alimento2 = Alimento::create([
            "nombre"=>"Manzana",
            "peso" =>40,
            "valor_calorico" =>30,
            "carbohidrato" =>50,
            "proteina" => 120,
            "grasa" =>10,
            "categoria_id" =>4,
            "medida_id" =>1,
        ]);
        $alimento2->imagen()->create([
            "public_id"=>"alimentoSeeder/fcxo3plhtea8bmidznle",
            "url"=>"https://res.cloudinary.com/dkzs70zvl/image/upload/v1655660354/alimentoSeeder/fcxo3plhtea8bmidznle.png"
        ]);


        $alimento3 = Alimento::create([
            "nombre"=>"Uva",
            "peso" =>10,
            "valor_calorico" =>20,
            "carbohidrato" =>40,
            "proteina" => 60,
            "grasa" =>5,
            "categoria_id" =>4,
            "medida_id" =>1,
        ]);
        $alimento3->imagen()->create([
            "public_id"=>"alimentoSeeder/mpotqzypbkknvrjubu9t",
            "url"=>"https://res.cloudinary.com/dkzs70zvl/image/upload/v1655660377/alimentoSeeder/mpotqzypbkknvrjubu9t.png"
        ]);
    }
}
