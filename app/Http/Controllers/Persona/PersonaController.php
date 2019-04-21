<?php

namespace App\Http\Controllers\Persona;

use App\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PersonaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$personas = Persona::where('sub_estacion_id', null)->get();
        return $this->showAll($personas);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::where('sub_estacion_id', null)->findOrFail($id);
        return $this->showOne($persona);
    }
}
