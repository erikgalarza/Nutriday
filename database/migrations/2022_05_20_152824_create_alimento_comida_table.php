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
        Schema::create('alimento_comida', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alimento_id');
            $table->unsignedBigInteger('comida_id');
            $table->unsignedBigInteger('dia_id');
            $table->integer('cantidad')->default(1);
           $table->foreign('alimento_id')->references('id')->on('alimentos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('comida_id')->references('id')->on('comidas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('alimento_comida');
    }
};
