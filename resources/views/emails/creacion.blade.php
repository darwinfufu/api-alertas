@component('mail::message')
# Confirma tu Cuenta!
Buen día! {{$usuario->nombre.' '.$usuario->apellido}}. <br/> <br/>
Gracias por crear tu cuenta en Alertas UMG y contribuir a la reducción de los robos y permitirnos actuar de forma más rápida y apropiada.
<br/> <br/>
Por favor verifica tu cuenta, presiona el botón:
@component('mail::button', ['url' => route('verificar', $usuario->token_verificacion)])
Verificar
@endcomponent

@endcomponent