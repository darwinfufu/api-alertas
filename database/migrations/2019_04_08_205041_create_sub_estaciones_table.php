<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubEstacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_estaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_subestacion', 45);
            $table->string('ubicacion', 255);
            $table->string('telefono',15);
            $table->string('latitud');
            $table->string('longitud');
            $table->integer('estacion_id')->unsigned();
            $table->timestamps();

            $table->foreign('estacion_id')->references('id')->on('estaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_estaciones');
    }
}
