<?php

namespace Database\Seeders;

use App\Models\Actividad;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actividad1 = Actividad::create([
            "nombre"=>"Yoga",
            "descripcion"=>"30 minutos de relajación diaria, dos veces al día",
            // "prioridad"=>2
        ]);
        $actividad1->imagen()->create([
            "url"=>"https://res.cloudinary.com/dkzs70zvl/image/upload/v1655658906/actividadSeeder/d35mwsw0egxu7d4dahnl.avif",
            "public_id"=>"actividadSeeder/d35mwsw0egxu7d4dahnl"
        ]);

        $actividad2 = Actividad::create([
            "nombre"=>"Caminar",
            "descripcion"=>"30 minutos de camanita diaria, 1 vez al día",
            // "prioridad"=>3
        ]);
        $actividad2->imagen()->create([
            "url"=>"https://res.cloudinary.com/dkzs70zvl/image/upload/v1655658906/actividadSeeder/tsrrgldrtqnhrlkyfhxz.jpg",
            "public_id"=>"actividadSeeder/tsrrgldrtqnhrlkyfhxz"
        ]);

        $actividad3 = Actividad::create([
            "nombre"=>"Nadar",
            "descripcion"=>"2 hora de natación a la semana ",
            // "prioridad"=>1
        ]);
        $actividad3->imagen()->create([
            "url"=>"https://res.cloudinary.com/dkzs70zvl/image/upload/v1655658906/actividadSeeder/zmen9kuuteozxzfexe47.avif",
            "public_id"=>"actividadSeeder/zmen9kuuteozxzfexe47"
        ]);
    }
}
