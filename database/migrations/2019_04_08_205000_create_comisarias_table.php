<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComisariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comisarias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_comisaria',45);
            $table->string('ubicacion', 150);
            $table->string('telefono',15);
            $table->string('latitud', 100)->nullable();
            $table->string('longitud', 100)->nullable();
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
        Schema::dropIfExists('comisarias');
    }
}
