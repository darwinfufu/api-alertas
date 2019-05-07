<?php

use Illuminate\Database\Seeder;

class ComisariasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Creación de comisarías
        //Comisaría No. 1
        DB::table('comisarias')->insert([
            'num_comisaria'		=>  '42',
            'ubicacion'			=>  '9 Calle 8-66 Zona 1 San Marcos',
            'telefono'			=>	'40216303',
        ]);

        //Comisaría No. 2
        DB::table('comisarias')->insert([
            'num_comisaria'		=>  '41',
            'ubicacion'			=>  '13 Av. y Calle “A” Zona 1 Quetzaltenango',
            'telefono'			=>	'40217238',
        ]);  
    }
}
