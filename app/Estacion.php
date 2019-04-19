<?php

namespace App;

use App\Comisaria;
use App\SubEstacion;
use Illuminate\Database\Eloquent\Model;

class Estacion extends Model
{
    protected $table = 'estaciones';
    protected $primary_key = 'id';

    protected $fillable = [
        'num_estacion', 
        'ubicacion',
        'telefono', 
        'latitud',
        'longitud',
        'comisaria_id',
    ];

    /**
     * Estacion tiene muchas Subestaciones.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subestaciones()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = estacion_id, localKey = id)
        return $this->hasMany(SubEstacion::class, 'estacion_id');
    }

    /**
     * Estacion pertenece a una Comisaria.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comisaria()
    {
        // belongsTo(RelatedModel, foreignKey = comisaria_id, keyOnRelatedModel = id)
        return $this->belongsTo(Comisaria::class, 'comisaria_id');
    }
}
