<?php

namespace App;

use App\Estacion;
use Illuminate\Database\Eloquent\Model;

class Comisaria extends Model
{
    protected $table = 'comisarias';
    protected $primary_key = 'id';

    protected $fillable = [
        'num_comisaria', 
        'ubicacion',
        'telefono',
    ];

    /**
     * Comisaria tiene muchas Estaciones.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estaciones()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = comisaria_id, localKey = id)
        return $this->hasMany(Estacion::class, 'comisaria_id');
    }

}
