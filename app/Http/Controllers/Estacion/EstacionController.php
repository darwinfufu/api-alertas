<?php

namespace App\Http\Controllers\Estacion;

use App\Estacion;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class EstacionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estaciones = Estacion::all();
        return $this->showAll($estaciones);
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
            'comisaria_id'  =>      'required'
        ];

        $this->validate($request, $reglas);

        $campos = $request->all();

        $estacion = Estacion::create($campos);

        return $this->showOne($estacion, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estacion = Estacion::findOrFail($id);
        return $this->showOne($estacion);
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
        $estacion = Estacion::findOrFail($id);

        $reglas = [
            'ubicacion'     =>      'required',
            'telefono'      =>      'required',
            'comisaria_id'  =>      'required'
        ];

        $this->validate($request, $reglas);

        if($request->has('num_estacion')){
            $estacion->num_estacion = $request->num_estacion;
        }

        if($request->has('ubicacion')){
            $estacion->ubicacion = $request->ubicacion;
        }

        if($request->has('telefono')){
            $estacion->telefono = $request->telefono;   
        }

        if($request->has('latitud')){
            $estacion->latitud = $request->latitud;
        }

        if($request->has('longitud')){
            $estacion->longitud = $request->longitud;   
        }

        if($request->has('comisaria_id')){
            $estacion->comisaria_id = $request->comisaria_id;   
        }

        if (!$estacion->isDirty()) {
            return $this->errorResponse('Especifique al menos un valor diferente para poder actualizar', 422);
        }

        $estacion->save();

        return $this->showOne($estacion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estacion = Estacion::findOrFail($id);
        $estacion->delete();

        return $this->showOne($estacion);
    }
}
