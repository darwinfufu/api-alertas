<?php

use App\User;
use App\Alerta;
use Illuminate\Database\Seeder;

class AlertasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creación de alertas
        //Alerta No. 1
        DB::table('alertas')->insert([
            'descripcion'		=>	'robo de moto tipo pasola color verde',
            'latitud'			=>	'14.965311',
            'longitud'			=>	'-91.799722',
            'telefono_usuario'	=>	User::all()->find('2')->id,
            'estado'			=>	Alerta::alerta_enviada,
            'usuario_id'		=>	2
        ]);

        //Alerta No. 2
         DB::table('alertas')->insert([
            'descripcion'		=>	'robo de carro tipo pick up',
            'latitud'			=>	'14.969179',
            'longitud'			=>	'-91.792333',
            'telefono_usuario'	=>	User::all()->find('2')->id,
            'estado'			=>	Alerta::alerta_espera,
            'usuario_id'		=>	2
        ]);
    }
}
