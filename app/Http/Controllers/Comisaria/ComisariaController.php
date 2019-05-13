<?php

namespace App\Http\Controllers\Comisaria;

use App\Comisaria;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ComisariaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comisarias = Comisaria::all();
        return $this->showAll($comisarias);
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
            'num_comisaria' =>  'required',
            'ubicacion'     =>  'required',
            'telefono'      =>  'required'
        ];

        $this->validate($request, $reglas);

        //Campos que vienen en la petición
        $campos = $request->all();

        //Asignación masiva de los campos
        $comisaria = Comisaria::create($campos);

        //Se realizó la operación con éxito, se retorna una respuesta de tipo 201
        return $this->showOne($comisaria,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comisaria $comisaria)
    {
        return $this->showOne($comisaria);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comisaria $comisaria)
    {
        if($request->has('num_comisaria')){
            $comisaria->num_comisaria = $request->num_comisaria;
        }

        if($request->has('ubicacion')){
            $comisaria->ubicacion = $request->ubicacion;
        }

        if($request->has('telefono')){
            $comisaria->telefono = $request->telefono;   
        }

        if (!$comisaria->isDirty()) {
            return $this->errorResponse('Especifique al menos un valor diferente para poder actualizar', 422);
        }

        $comisaria->save();

        return $this->showOne($comisaria);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comisaria $comisaria)
    {
        $comisaria->delete();

        return $this->showOne($comisaria);
    }
}
