<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dieta_acds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dieta_id');// 1
            $table->unsignedBigInteger('acd_id');// 1          
            $table->foreign('dieta_id')->references('id')->on('dietas');
            $table->foreign('acd_id')->references('id')->on('alimento_comida_dias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dieta_adc');
    }
};
