<?php

namespace App;

use App\Policia;
use App\Estacion;
use Illuminate\Database\Eloquent\Model;

class SubEstacion extends Model
{
    protected $table = 'sub_estaciones';
    protected $primary_key = 'id';

    protected $fillable = [
        'num_subestacion', 
        'ubicacion',
        'telefono', 
        'latitud',
        'longitud',
        'estacion_id',
    ];

    /**
     * SubEstacion tiene muchos Policias.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function policias()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = subEstacion_id, localKey = id)
        return $this->hasMany(Policia::class, 'sub_estacion_id');
    }

    /**
     * SubEstacion pertenece a una sola Estacion.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estacion()
    {
        // belongsTo(RelatedModel, foreignKey = estacion_id, keyOnRelatedModel = id)
        return $this->belongsTo(Estacion::class, 'estacion_id');
    }

}
