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
            'nombre'				=>	'jorge',
            'apellido'				=>	'díaz',
            'dpi'					=>	'1562-24596-1201',
            'genero'				=>	'masculino',
            'telefono'				=>	'45968574',
            'correo'				=>	'jorged@yopmail.com',
            'contrasena'			=>	bcrypt('jorge12'),
            'sub_estacion_id'       =>  null,
            'verificado'			=>	User::usuario_no_verificado,
            'token_verificacion'	=>	User::generarTokenVerificacion(),
            'admin'					=>	User::usuario_regular,
        ]);

        //Usuario No. 2 - Usuario normal sin privilegios pero siendo policía
        DB::table('usuarios')->insert([
            'nombre'				=>	'alexander',
            'apellido'				=>	'fuentes',
            'dpi'					=>	'2685-54789-1201',
            'genero'				=>	'masculino',
            'telefono'				=>	'56748596',
            'correo'				=>	'alexf@yopmail.com',
            'sub_estacion_id'       =>  SubEstacion::all()->find(2)->id,
            'contrasena'			=>	bcrypt('alexander12'),
            'verificado'			=>	User::usuario_verificado,
            'token_verificacion'	=>	null,
            'admin'					=>	User::usuario_regular,
        ]);

        //Usuario No. 3 - Usuario administrador y que es policía también
        DB::table('usuarios')->insert([
            'nombre'				=>	'gerardo',
            'apellido'				=>	'martínez',
            'dpi'					=>	'6523-85476-1202',
            'genero'				=>	'masculino',
            'telefono'				=>	'36548596',
            'correo'				=>	'gerardom@yopmail.com',
            'contrasena'			=>	bcrypt('gerardo12'),
            'sub_estacion_id'       =>  SubEstacion::all()->find(1)->id,
            'verificado'			=>	User::usuario_verificado,
            'token_verificacion'	=>	null,
            'admin'					=>	User::usuario_administrador,
        ]);

        DB::table('usuarios')->insert([
            'nombre'                =>  'maría',
            'apellido'              =>  'aguilar',
            'dpi'                   =>  '1456-48963-1201',
            'genero'                =>  'femenino',
            'telefono'              =>  '45896536',
            'correo'                =>  'maria@yopmail.com',
            'contrasena'            =>  bcrypt('maria12'),
            'sub_estacion_id'       =>  SubEstacion::all()->find(1)->id,
            'verificado'            =>  User::usuario_verificado,
            'token_verificacion'    =>  null,
            'admin'                 =>  User::usuario_administrador,
        ]);
    }
}
