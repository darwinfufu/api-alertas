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
		$personas = Persona::all();
        return $this->showAll($personas);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return $this->showOne($persona);
    }
}
