@component('mail::message')
# Confirma Correo!
Buen día! {{$usuario->nombre.' '.$usuario->apellido}}. <br/> <br/>
Gracias por seguir contribuyendo en Alertas UMG.
<br/> <br/>
Has cambiado tu correo electrónico, para verificarlo solo ingresa al siguiente enlace:
@component('mail::button', ['url' => route('verificar', $usuario->token_verificacion)])
Confirmar
@endcomponent

@endcomponent