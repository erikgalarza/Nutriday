<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VideoSeeder extends Seeder
{
    public function run()
    {
        Video::create([
            "titulo"=>"BROWNIE en MICROONDAS 🍫 | en 2 minutos",
            "categoria"=>"Recetas",
            "descripcion"=>"Como preparar un delicioso brownie en poco tiempo",
            "url"=>"https://youtu.be/6ZUzA3SjFu0"
        ]);
    }
}
