<?php

use Illuminate\Http\Request;

/*
	Alertas
*/
Route::resource('alertas','Alerta\AlertaController', ['except' => ['create', 'edit']]);


/*
	Comisarías
*/
Route::resource('comisarias','Comisaria\ComisariaController', ['only' => ['index', 'show']]);

/*
	Estaciones de Policía
*/
Route::resource('estaciones','Estacion\EstacionController', ['only' => ['index', 'show']]);

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
Route::resource('subestaciones','SubEstacion\SubEstacionController', ['only' => ['index', 'show']]);


/*
	Usuarios 
*/
Route::resource('usuarios','Usuario\UsuarioController', ['except' => ['create', 'edit']]);