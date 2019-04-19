<?php

use Illuminate\Database\Seeder;

class SubEstacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creación de SubEstaciones de policias
        //Subestacion No. 1
        DB::table('sub_estaciones')->insert([
            'num_subestacion'	=>  '42-11',
            'ubicacion'			=>  'Colonia San Marcos, San Marcos',
            'telefono'			=>	'45968563',
            'latitud'			=>	'14.957428',
            'longitud'			=>	'-91.806085',
            'estacion_id'		=>	1
        ]);

        //Subestacion No. 2
        DB::table('sub_estaciones')->insert([
            'num_subestacion'	=>  '42-13',
            'ubicacion'			=>  'San Pedro Sacatepéquez, San Marcos',
            'telefono'			=>	'59876315',
            'latitud'			=>	'14.967832',
            'longitud'			=>	'-91.775455',
            'estacion_id'		=>	1
        ]);

        //Subestacion No. 3
        DB::table('sub_estaciones')->insert([
            'num_subestacion'	=>  '42-61',
            'ubicacion'			=>  'Malacatán, San Marcos',
            'telefono'			=>	'47484956',
            'latitud'			=>	'14.912957',
            'longitud'			=>	'-92.060304',
            'estacion_id'		=>	1
        ]);

        //Subestacion No. 4
        DB::table('sub_estaciones')->insert([
            'num_subestacion'	=>  '41-17',
            'ubicacion'			=>  'Zona 7, Quetzaltenango',
            'telefono'			=>	'58574635',
            'latitud'			=>	'14.851166',
            'longitud'			=>	'-91.515256',
            'estacion_id'		=>	2
        ]);

        //Subestacion No. 5
        DB::table('sub_estaciones')->insert([
            'num_subestacion'	=>  '41-20',
            'ubicacion'			=>  '5a. Calle 9-283 zona 1, La Esperanza, quetzaltenango., Quezaltenango',
            'telefono'			=>	'36785962',
            'latitud'			=>	'14.871761',
            'longitud'			=>	'-91.543417',
            'estacion_id'		=>	2
        ]);
    }
}
