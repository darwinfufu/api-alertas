<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('dpi', 45)->unique()->nullable();
            $table->enum('genero',[
                User::masculino, 
                User::femenino
            ]);
            $table->string('telefono', 15);
            $table->string('correo')->unique();
            $table->string('contrasena',100);
            $table->integer('sub_estacion_id')->unsigned()->nullable();
            $table->string('verificado', 10)->default(User::usuario_no_verificado);
            $table->string('token_verificacion', 50)->nullable();
            $table->string('admin', 10)->default(User::usuario_regular);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('sub_estacion_id')->references('id')->on('sub_estaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
