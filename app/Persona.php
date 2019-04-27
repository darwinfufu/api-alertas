<?php

namespace App;

use App\Alerta;
use App\Scopes\PersonaScope;

class Persona extends User
{

    protected static function boot(){//Scope para la inyección implícita del controlador de persona
        parent::boot();
        static::addGlobalScope(new PersonaScope);
    }

}
