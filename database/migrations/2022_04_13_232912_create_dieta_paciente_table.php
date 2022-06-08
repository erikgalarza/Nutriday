<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dieta_paciente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dieta_id');
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('user_id')->nullable();
           
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dieta_id')->references('id')->on('dietas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('dieta_paciente');
    }
};
