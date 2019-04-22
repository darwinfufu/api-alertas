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

    /**
     * Una Persona tiene muchas Alertas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alertas()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = usuario_id, localKey = id)
    	return $this->hasMany(Alerta::class, 'usuario_id');
    }

}
