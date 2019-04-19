<?php

namespace App;

use App\Persona;
use App\Policia;
use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    protected $table = 'alertas';
    protected $primary_key = 'id';

    //constantes para el estado de la alerta
    const alerta_atendida = 'atendida';
    const alerta_cancelada = 'cancelada';
    const alerta_enviada = 'enviada';
    const alerta_no_enviada = 'no enviada';
    const alerta_espera = 'en espera';
    
    protected $fillable = [
        'descripcion',
        'latitud', 
        'longitud', 
        'telefono_usuario',
        'estado',
        'usuario_id',
    ];


    /*
        Las Alertas las puede enviar tanto un persona regular como un policía para pedir apoyo
    */



    /**
     * Alerta puede pertenecer a una Persona regular.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        // belongsTo(RelatedModel, foreignKey = persona_id, keyOnRelatedModel = id)
        return $this->belongsTo(Persona::class);
    }

    /**
     * Alerta puede pertenecer a un Policia.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function policia()
    {
        // belongsTo(RelatedModel, foreignKey = policia_id, keyOnRelatedModel = id)
        return $this->belongsTo(Policia::class);
    }

}
