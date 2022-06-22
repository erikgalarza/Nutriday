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
        Schema::create('a_c_d', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alimento_id');// 1
            $table->unsignedBigInteger('comida_id');// 1
            $table->unsignedBigInteger('dia_id');// 1          
            $table->foreign('alimento_id')->references('id')->on('alimentos');
            $table->foreign('comida_id')->references('id')->on('comidas');
            $table->foreign('dia_id')->references('id')->on('dias');
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
        Schema::dropIfExists('a_c_d');
    }
};
