<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comisaria extends Model
{
    protected $table = 'comisarias';
    protected $primary_key = 'id';
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_actualizado';

    protected $fillable = [
        'num_comisaria', 
        'ubicacion', 
        'latitud',
        'longitud',
    ];

    /**
     * Comisaria tiene muchas Estaciones.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estaciones()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = comisaria_id, localKey = id)
        return $this->hasMany(Estacione::class, 'comisaria_id');
    }

}
