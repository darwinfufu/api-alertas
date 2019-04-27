<?php

namespace App;

use App\Alerta;
use App\SubEstacion;
use App\Scopes\PoliciaScope;

class Policia extends User
{
    protected static function boot(){
        parent::boot();
        static::addGlobalScope(new PoliciaScope);
    }

    /**
     * Policia pertenece a una sola SubEstación.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subestacion()
    {
    	// belongsTo(RelatedModel, foreignKey = sub_estacion_id, keyOnRelatedModel = id)
    	return $this->belongsTo(SubEstacion::class, 'sub_estacion_id');
    }
}
