<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(ComisariasSeeder::class);
    	$this->call(EstacionesSeeder::class);
    	$this->call(SubEstacionesSeeder::class);
    	$this->call(UsuariosSeeder::class);
    	$this->call(AlertasSeeder::class);
    }
}
