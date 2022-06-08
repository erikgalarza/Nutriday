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
        Schema::create('comida_dia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comida_id');
            $table->unsignedBigInteger('dia_id');
           $table->foreign('comida_id')->references('id')->on('comidas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dia_id')->references('id')->on('dias')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('comida_dia');
    }
};
