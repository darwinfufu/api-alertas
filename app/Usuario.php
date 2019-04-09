<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primary_key = 'id';
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_actualizado';

    //Constantes para saber si el usuario ya está verificado
    const usuario_verificado = '1';
    const usuario_no_verificado = '0';

    //Constantes para saber si un usuario es administrador o usuario regular
    const usuario_administrador = 'true';
    const usuario_regular = 'false';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 
        'apellidos', 
        'dpi',
        'genero',
        'telefono',
        'correo',
        'contrasena',
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

    public function esVerificado(){
        return $this->verificado == User::usuario_verificado;
    }

    public function esAdmin(){
        return $this->admin == User::usuario_administrador;
    }

    public function generarTokenVerificacion(){
        //Genera un token con cadena de 40 caracteres
        return str_random(40);
    }
}