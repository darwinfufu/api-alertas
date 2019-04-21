<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

//Trait creado para generalizar las respuestas de la api en todos los metodos de respuesta
trait ApiResponser
{
	//Función que devolverá los datos de respuesta y el código de la respuesta
	private function successResponse($data, $code){
		return response()->json($data, $code);
	}

	//Si hubo error se envía el mensaje de error y el código del mismo
	protected function errorResponse($message, $code){
		return response()->json(['error' => $message, 'código' => $code], $code);
	}

	//Mostrará una colección de instancias o datos = método index en donde se muestran todos los datos
	protected function showAll(Collection $collection, $code = 200){
		return $this->successResponse(['data' => $collection], $code);
	}

	//Muestra una sola instance de un modelo en específico
	protected function showOne(Model $instance, $code = 200){
		return $this->successResponse(['data' => $instance], $code);
	}
}