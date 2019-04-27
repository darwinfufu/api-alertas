<?php

namespace App\Http\Controllers\Usuario;

use App\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class AlertaUsuarioController extends ApiController
{
    //Función para mostrar todas las alertas del usuario específico
    public function index(User $usuario)
    {
        $alertas = $usuario->alertas;
        if($alertas == ''){
        	return $this->errorResponse("El usuario con el id especificado no ha enviado ningún tipo alerta", 404);
        }else{
        	return $this->showAll($alertas);	
        }
    }

}
