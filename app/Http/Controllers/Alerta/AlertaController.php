<?php

namespace App\Http\Controllers\Alerta;

use App\User;
use App\Alerta;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class AlertaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alertas = Alerta::all();
        return $this->showAll($alertas);
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
            'descripcion'       =>  'required',
            'telefono_usuario'  =>  'min:8|required',
            'usuario_id'        =>  'required'
        ];

        $this->validate($request, $reglas);

        $campos = $request->all();
        //Por defecto si la alerta llega a la base de datos se toma como enviada
        $campos['estado'] = Alerta::alerta_enviada;
        
        $alerta = Alerta::create($campos);

        return $this->showOne($alerta, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alerta = Alerta::findOrFail($id);
        return $this->showOne($alerta);
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
        $alerta = Alerta::findOrFail($id);

        $reglas = [
            'descripcion'       =>  'required',
            'telefono_usuario'  =>  'min:8|required',
            'estado'            =>  'in' . Alerta::alerta_atendida . ',' . Alerta::alerta_cancelada . ',' . Alerta::alerta_enviada . ',' . Alerta::alerta_espera
        ];

        $this->validate($request, $reglas);

        if($request->has('descripcion')){
            $alerta->descripcion = $request->descripcion;
        }

        if($request->has('latitud')){
            $alerta->latitud = $request->latitud;
        }

        if($request->has('longitud')){
            $alerta->longitud = $request->longitud;
        }

        if($request->has('telefono_usuario')){
            $alerta->telefono_usuario = $request->telefono_usuario;
        }

        if($request->has('estado')){
            $usuario = User::findOrFail(auth()->user()->id);

            if (!$usuario->esAdmin()) {//Si el usuario autenticado no es admin
                //El código 409 para decir que la petición es incorrecta o nó válida
                return $this->errorResponse('Sólo los administradores pueden cambiar el estado de una alerta', 409);
            }

            $alerta->estado = $request->estado;
        }

        if($request->has('usuario_id')){
            $alerta->usuario_id = $request->usuario_id;
        }

        if (!$alerta->isDirty()) {
            //Si no cambió ningún valor respecto a los originales se envía una respuesta con código 422 de que la petición está mal formada
            return $this->errorResponse('Especifique al menos un valor diferente para poder actualizar', 422);
        }

        $alerta->save();

        return $this->showOne($alerta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alerta = Alerta::findOrFail($id);
        $alerta->delete();

        return $this->showOne($alerta);
    }
}
