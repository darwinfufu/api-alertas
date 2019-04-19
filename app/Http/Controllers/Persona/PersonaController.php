<?php

namespace App\Http\Controllers\Persona;

use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$personas = Persona::where('sub_estacion_id', null)->get();
        return response()->json(['data' => $personas], 200);
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
        return response()->json(['data' => $persona], 200);
    }
}
