<?php

use Illuminate\Http\Request;

/*
	Alertas
*/
Route::resource('alertas','Alerta\AlertaController', ['except' => ['create', 'edit']]);


/*
	Comisarías
*/
Route::resource('comisarias','Comisaria\ComisariaController', ['except' => ['create', 'edit']]);

/*
	Estaciones de Policía
*/
Route::resource('estaciones','Estacion\EstacionController', ['except' => ['create', 'edit']]);

/*
	Personas Comunes
*/
Route::resource('personas','Persona\PersonaController', ['only' => ['index', 'show']]);

/*
	Policías
*/
Route::resource('policias','Policia\PoliciaController', ['only' => ['index', 'show']]);

/*
	SubEstaciones de Policía
*/
Route::resource('subestaciones','SubEstacion\SubEstacionController', ['except' => ['create', 'edit']]);


/*
	Usuarios 
*/
Route::resource('usuarios','Usuario\UsuarioController', ['except' => ['create', 'edit']]);

//Ruta para verificar usuarios
Route::name('verificar')->get('usuarios/verificar/{token}', 'Usuario\UsuarioController@verificar');
//Ruta para reenviar el correo de verificación
Route::name('reenviar')->get('usuarios/{usuario}/reenviar', 'Usuario\UsuarioController@reenviar');

/*
	Alertas de un usuario específico - Operación compleja
*/
Route::resource('usuarios.alertas','Usuario\AlertaUsuarioController', ['only' => ['index']]);