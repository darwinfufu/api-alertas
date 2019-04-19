<?php

namespace App\Http\Controllers\Usuario;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return response()->json(['data' => $usuarios],200);
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
            'nombre'        =>  'required',
            'apellido'      =>  'required',
            'dpi'           =>  'required|unique:usuarios',
            'correo'        =>  'required|email|unique:usuarios',
            'contrasena'    =>  'required|min:6|confirmed'
        ];

        $this->validate($request, $reglas);

        //Campos que vienen en la petición
        $campos = $request->all();

        $campos['contrasena'] = bcrypt($request->contrasena);
        $campos['verificado'] = User::usuario_no_verificado;
        $campos['token_verificacion'] = User::generarTokenVerificacion();
        $campos['admin'] = User::usuario_regular;

        //Asignación masiva de los campos
        $usuario = User::create($campos);

        //Se realizó la operación con éxito, se retorna una respuesta de tipo 201
        return response()->json(['data' => $usuario], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return response()->json(['data' => $usuario],200);
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
        $usuario = User::findOrFail($id);

        //Reglas de validación
        $reglas = [
            'dpi'           =>  'unique:usuarios, cooreo,' . $usuario->id,
            'correo'        =>  'email|unique:usuarios',
            'contrasena'    =>  'min:6|confirmed',
            'admin'         =>  'in:' . User::usuario_administrador . ',' . User::usuario_regular,
        ];

        $this->validate($request, $reglas);

        if($request->has('nombre')){
            $usuario->nombre = $request->nombre;
        }

        if($request->has('apellido')){
            $usuario->apellido = $request->apellido;
        }

        if($request->has('correo') && $usuario->correo != $request->correo){
            //Si el usuario ingresa uno diferente al que tiene, su cuenta se vuelve no verificada y se genera un token para que pueda verificar su cuenta posteriormente con el envío de un correo
            $usuario->verificado = User::usuario_no_verificado;
            $usuario->token_verificacion = User::generarTokenVerificacion();
            $usuario->correo = $request->correo;
        }

        if($request->has('dpi')){
            $usuario->dpi = $request->dpi;
        }

        if($request->has('genero')){
            $usuario->genero = $request->genero;   
        }

        if($request->has('telefono')){
            $usuario->telefono = $request->telefono;   
        }
        
        if($request->has('contrasena')){
            $usuario->contrasena = bcrypt($request->contrasena);   
        }

        if($request->has('admin')){
            if (!$usuario->esVerificado()) {//Si el usuario no está verificado no puede cambiar el valor de admin
                //El código 409 para decir que la petición es incorrecta o nó válida
                return response()->json(['error' => 'Sólo usuarios verificados pueden cambiar el valor de administrador', 'code' => 409], 409);
            }

            $usuario->admin = $request->admin;
        }

        if (!$usuario->isDirty()) {
            //Si no cambió ningún valor respecto a los originales se envía una respuesta con código 422 de que la petición está mal formada
            return response()->json(['error' => 'Especifique al menos un valor diferente para poder actualizar', 'code' => 422], 422);
        }

        $usuario->save();

        return response()->json(['data' => $usuario], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return response()->json(['data' => $usuario], 200);
    }
}
