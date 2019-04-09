<?php

namespace App;

use App\Alerta;

class Persona extends User
{

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
