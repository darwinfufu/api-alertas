<?php

use App\User;
use App\Alerta;
use App\Estacion;
use App\Comisaria;
use App\SubEstacion;
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        
        User::truncate();
        Comisaria::truncate();
        Estacion::truncate();
        SubEstacion::truncate();
        Alerta::truncate();

        User::flushEventListeners();
        Comisaria::flushEventListeners();
        Estacion::flushEventListeners();
        SubEstacion::flushEventListeners();
        Alerta::flushEventListeners();

    	$this->call(ComisariasSeeder::class);
    	$this->call(EstacionesSeeder::class);
    	$this->call(SubEstacionesSeeder::class);
    	$this->call(UsuariosSeeder::class);
    	$this->call(AlertasSeeder::class);
    }
}
