<?php

namespace App\Http\Controllers\Policia;

use App\Policia;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PoliciaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policias = Policia::has('subestacion')->get();

        return $this->showAll($policias);
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

        return $this->showOne($policia);
    }

    
}
