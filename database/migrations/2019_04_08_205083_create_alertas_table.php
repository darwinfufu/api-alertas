<?php

use App\Alerta;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alertas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',150)->nullable();
            $table->string('latitud');
            $table->string('longitud');
            $table->string('telefono_usuario', 15);
            $table->enum('estado',[
                Alerta::alerta_atendida,
                Alerta::alerta_cancelada,
                Alerta::alerta_enviada,
                Alerta::alerta_espera
            ])->default(Alerta::alerta_enviada);
            $table->integer('usuario_id')->unsigned();
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alertas');
    }
}
