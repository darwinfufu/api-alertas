<?php

use Illuminate\Database\Seeder;

class EstacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creación de estaciones de policía
        //Estación No. 1
        DB::table('estaciones')->insert([
            'num_estacion'		=>  '42-1',
            'ubicacion'			=>  'Cantón Santa Izabel, Zona 3 Local 1, 3er Nivel San Marcos, San Marcos',
            'telefono'			=>	'40216303',
            'comisaria_id'		=>	1
        ]);

        //Estación No. 2
        DB::table('estaciones')->insert([
            'num_estacion'		=>  '41-1',
            'ubicacion'			=>  'Final de la Zona 6, Cantón Choqui, Quetzaltenango',
            'telefono'			=>	'40216303',
            'comisaria_id'		=>	2
        ]);  
    }
}
