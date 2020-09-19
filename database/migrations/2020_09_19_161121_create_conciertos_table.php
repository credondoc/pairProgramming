<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConciertosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conciertos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_promotor');
            $table->foreign('id_promotor')->references('id')->on('promotors');
            $table->unsignedBigInteger('id_recinto');
            $table->foreign('id_recinto')->references('id')->on('recintos');
            $table->string('nombre');
            $table->unsignedInteger('numero_espectadores');
            $table->dateTime('fecha');
            $table->float('rentabilidad',11, 2);
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
        Schema::dropIfExists('conciertos');
    }
}
