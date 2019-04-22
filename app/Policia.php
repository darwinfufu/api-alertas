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
     * Policia puede enviar muchas Alertas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alertas()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = policia_id, localKey = id)
    	return $this->hasMany(Alerta::class, 'usuario_id');
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
