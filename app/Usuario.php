<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primary_key = 'id';

    //Constantes para saber si el usuario ya está verificado
    const usuario_verificado = 'true';
    const usuario_no_verificado = 'false';

    //Constantes para saber si un usuario es administrador o usuario regular
    const usuario_administrador = 'true';
    const usuario_regular = 'false';

    //Constantes para saber el género del usuario
    const masculino = 'Masculino';
    const femenino = 'Femenino';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 
        'apellido', 
        'dpi',
        'genero',
        'telefono',
        'correo',
        'contrasena',
        'sub_estacion_id',
        'verificado',
        'token_verificacion',
        'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contrasena', 
        'remember_token',
        'token_verificacion',
    ];

    //Mutadores y Accesores para el nombre y apellido del usuario y para el género
    public function setAtrNombre($valor){
        $this->attributes['nombre'] = strtolower($valor);
    }

    public function getAtrNombre($valor){
        return ucwords($valor);
    }

    public function setAtrApellido($valor){
        $this->attributes['apellido'] = strtolower($valor);
    }

    public function getAtrApellido($valor){
        return ucwords($valor);
    }

    public function setAtrGenero($valor){
        $this->attributes['genero'] = strtolower($valor);
    }

    public function getAtrGenero($valor){
        return ucfirst($valor);
    }

    public function setAtrCorreo($valor){
        $this->attributes['correo'] = strtolower($valor);
    }

    public function esVerificado(){
        return $this->verificado == User::usuario_verificado;
    }

    public function esAdmin(){
        return $this->admin == User::usuario_administrador;
    }

    public static function generarTokenVerificacion(){
        //Genera un token con cadena de 40 caracteres
        return str_random(40);
    }
}