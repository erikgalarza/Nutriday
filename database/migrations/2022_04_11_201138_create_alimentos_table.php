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
        Schema::create('alimentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('peso');
            $table->decimal('valor_calorico');
            $table->decimal('carbohidrato');
            $table->decimal('proteina');
            $table->decimal('grasa');

            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('medida_id');

            $table->foreign('categoria_id')->references('id')->on('categoria_alimentos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('medida_id')->references('id')->on('medida_alimentos')->onDelete('cascade')->onUpdate('cascade');

            
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
        Schema::dropIfExists('alimentos');
    }
};
