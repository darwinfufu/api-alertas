<?php

namespace App\Http\Controllers\Policia;

use App\Policia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PoliciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policias = Policia::has('subestacion')->get();

        return response()->json(['data' => $policias], 200);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $policia = Policia::has('subestacion')->findOrFail($id);

        return response()->json(['data' => $policia], 200);
    }

    
}
