<?php

namespace App\Http\Controllers\SubEstacion;

use App\SubEstacion;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class SubEstacionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subestaciones = SubEstacion::all();
        return $this->showAll($subestaciones);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Reglas de validación
        $reglas = [
            'num_subestacion'   =>  'required',
            'ubicacion'         =>  'required',
            'telefono'          =>  'required',
            'estacion_id'       =>  'required'
        ];

        $this->validate($request, $reglas);

        $campos = $request->all();

        $subestacion = SubEstacion::create($campos);

        return $this->showOne($subestacion, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SubEstacion $subestacione)
    {
        return $this->showOne($subestacione);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubEstacion $subestacione)
    {
        if($request->has('num_subestacion')){
            $subestacione->num_subestacion = $request->num_subestacion;
        }

        if($request->has('ubicacion')){
            $subestacione->ubicacion = $request->ubicacion;
        }

        if($request->has('telefono')){
            $subestacione->telefono = $request->telefono;   
        }

        if($request->has('latitud')){
            $subestacione->latitud = $request->latitud;
        }

        if($request->has('longitud')){
            $subestacione->longitud = $request->longitud;   
        }

        if($request->has('estacion_id')){
            $subestacione->estacion_id = $request->estacion_id;   
        }

        if (!$subestacione->isDirty()) {
            return $this->errorResponse('Especifique al menos un valor diferente para poder actualizar', 422);
        }

        $subestacione->save();

        return $this->showOne($subestacione);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubEstacion $subestacione)
    {
        $subestacione->delete();

        return $this->showOne($subestacione);
    }
}
