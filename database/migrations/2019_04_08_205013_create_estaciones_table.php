<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_estacion', 45);
            $table->string('ubicacion', 255);
            $table->string('telefono',15);
            $table->string('latitud');
            $table->string('longitud');
            $table->integer('comisaria_id')->unsigned();
            $table->timestamps();

            $table->foreign('comisaria_id')->references('id')->on('comisarias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estaciones');
    }
}
