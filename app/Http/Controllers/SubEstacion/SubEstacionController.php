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
            'ubicacion'     =>      'required',
            'telefono'      =>      'required',
            'estacion_id'   =>      'required'
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
    public function show($id)
    {
        $subestacion = SubEstacion::findOrFail($id);
        return $this->showOne($subestacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subestacion = SubEstacion::findOrFail($id);

        $reglas = [
            'ubicacion'     =>      'required',
            'telefono'      =>      'required',
            'estacion_id'   =>      'required'
        ];

        $this->validate($request, $reglas);

        if($request->has('num_subestacion')){
            $subestacion->num_subestacion = $request->num_subestacion;
        }

        if($request->has('ubicacion')){
            $subestacion->ubicacion = $request->ubicacion;
        }

        if($request->has('telefono')){
            $subestacion->telefono = $request->telefono;   
        }

        if($request->has('latitud')){
            $subestacion->latitud = $request->latitud;
        }

        if($request->has('longitud')){
            $subestacion->longitud = $request->longitud;   
        }

        if($request->has('estacion_id')){
            $subestacion->estacion_id = $request->estacion_id;   
        }

        if (!$subestacion->isDirty()) {
            return $this->errorResponse('Especifique al menos un valor diferente para poder actualizar', 422);
        }

        $subestacion->save();

        return $this->showOne($subestacion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subestacion = SubEstacion::findOrFail($id);
        $subestacion->delete();

        return $this->showOne($subestacion);
    }
}
