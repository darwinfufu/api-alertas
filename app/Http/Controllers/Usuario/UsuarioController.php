<?php

namespace App\Http\Controllers\Usuario;

use App\User;
use Illuminate\Http\Request;
use App\Mail\CreacionUsuario;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

class UsuarioController extends ApiController
{
    public function index()
    {
        $usuarios = User::all();
        return $this->showAll($usuarios);
    }

    public function store(Request $request)
    {
        //Reglas de validación
        $reglas = [
            'nombre'        =>  'required',
            'apellido'      =>  'required',
            'dpi'           =>  'required|unique:usuarios',
            'telefono'      =>  'min:8',
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
        return $this->showOne($usuario, 201);

    }

    public function show(User $usuario)
    {
        return $this->showOne($usuario);
    }

    public function update(Request $request, User $usuario)
    {

        //Reglas de validación
        $reglas = [
            'dpi'           =>  'unique:usuarios, correo,' . $usuario->id,
            'correo'        =>  'email|unique:usuarios',
            'contrasena'    =>  'min:6|confirmed',
            'telefono'      =>  'min:8',
            'genero'        =>  'in:' . User::masculino . ',' . User::femenino,
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

        if($request->has('sub_estacion_id')){
            $usuario->sub_estacion_id = $request->sub_estacion_id;
        }

        if($request->has('admin')){
            if (!$usuario->esAdmin()) {//Si el usuario no es admin no puede cambiar el valor de admin
                //El código 409 para decir que la petición es incorrecta o nó válida
                return $this->errorResponse('Sólo usuarios administradores pueden cambiar el valor de admin', 409);
            }

            $usuario->admin = $request->admin;
        }

        if (!$usuario->isDirty()) {
            //Si no cambió ningún valor respecto a los originales se envía una respuesta con código 422 de que la petición está mal formada
            return $this->errorResponse('Especifique al menos un valor diferente para poder actualizar', 422);
        }

        $usuario->save();

        return $this->showOne($usuario);
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();

        return $this->showOne($usuario);
    }

    public function verificar($token){
        $usuario = User::where('token_verificacion', $token)->firstOrFail();
        $usuario->verificado = User::usuario_verificado;
        $usuario->token_verificacion = null;
        $usuario->save();
        return $this->showMessage('Su cuenta ha sido verificada correctamente!');
    }

    public function reenviar(User $usuario){
        //Si el usuario es verificado no es necesario reenviar
        if($usuario->esVerificado()){
            return $this->errorResponse('Este usuario ya está verificado', 409);
        }

        retry(5, function() use ($usuario){
            Mail::to($usuario->correo)->send(new CreacionUsuario($usuario));
        }, 100);
        
        return $this->showMessage('El correo de verificación se reenvió correctamente!');
    }
}
