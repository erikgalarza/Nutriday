<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(DiaSeeder::class);
        $this->call(ComidaSeeder::class);
        $this->call(CategoriaAlimentoSeeder::class);
        $this->call(MedidaAlimentoSeeder::class);
        $this->call(ActividadSeeder::class);
        $this->call(AlimentoSeeder::class);
    }
}
