<?php

use App\User;
use App\SubEstacion;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creación de usuarios
        //Usuario No. 1 - Usuario normal o persona regular
        DB::table('usuarios')->insert([
            'nombre'				=>	'Jorge',
            'apellido'				=>	'Díaz',
            'dpi'					=>	'1562-24596-1201',
            'genero'				=>	'Masculino',
            'telefono'				=>	'45968574',
            'correo'				=>	'jorged@umg.com',
            'contrasena'			=>	bcrypt('jorge12'),
            'sub_estacion_id'       =>  null,
            'verificado'			=>	User::usuario_no_verificado,
            'token_verificacion'	=>	User::generarTokenVerificacion(),
            'admin'					=>	User::usuario_regular,
        ]);

        //Usuario No. 2 - Usuario normal sin privilegios pero siendo policía
        DB::table('usuarios')->insert([
            'nombre'				=>	'Alexander',
            'apellido'				=>	'Fuentes',
            'dpi'					=>	'2685-54789-1201',
            'genero'				=>	'Masculino',
            'telefono'				=>	'56748596',
            'correo'				=>	'alexf@umg.com',
            'sub_estacion_id'       =>  SubEstacion::all()->find(2)->id,
            'contrasena'			=>	bcrypt('alexander12'),
            'verificado'			=>	User::usuario_verificado,
            'token_verificacion'	=>	null,
            'admin'					=>	User::usuario_regular,
        ]);

        //Usuario No. 3 - Usuario administrador y que es policía también
        DB::table('usuarios')->insert([
            'nombre'				=>	'Gerardo',
            'apellido'				=>	'Martínez',
            'dpi'					=>	'6523-85476-1202',
            'genero'				=>	'Masculino',
            'telefono'				=>	'36548596',
            'correo'				=>	'gerardom@umg.com',
            'contrasena'			=>	bcrypt('gerardo12'),
            'sub_estacion_id'       =>  SubEstacion::all()->find(1)->id,
            'verificado'			=>	User::usuario_verificado,
            'token_verificacion'	=>	null,
            'admin'					=>	User::usuario_administrador,
        ]);
    }
}
