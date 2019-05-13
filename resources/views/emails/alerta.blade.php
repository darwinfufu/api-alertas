@component('mail::message')
# ALERTA NUEVA!
Atención! Se recibió una nueva alerta con fecha y hora: {{ $alerta->created_at }}. <br/> <br/>
<strong>Datos de la alerta:</strong> <br/>
@if(is_null($alerta->usuario->sub_estacion_id))
    @if($alerta->usuario->admin == "true")
    <strong>Tipo:</strong> Usuario Administrador.
    @else
    <strong>Tipo:</strong> Usuario Regular.
    @endif
@elseif(!is_null($alerta->usuario->sub_estacion_id))
    @if($alerta->usuario->admin == "true")
    <strong>Tipo:</strong> Agente de la Policía y Usuario Administrador.
    @else
    <strong>Tipo:</strong> Agente de la Policía.
    @endif
@endif
<br/>
<strong>Nombre:</strong> {{ $alerta->usuario->nombre.' '.$alerta->usuario->apellido}}. <br/>
<strong>Teléfono:</strong> {{ $alerta->telefono_usuario }} <br/>
<strong>DPI:</strong> {{ $alerta->usuario->dpi }} <br/>
<strong>Email:</strong> {{ $alerta->usuario->correo }} <br/>
<br/> <br/>
<strong>Descripción:</strong> {{ $alerta->descripcion }}. <br/>
<strong>Latitud:</strong> {{ $alerta->latitud }} <br/>
<strong>Longitud:</strong> {{ $alerta->longitud }} <br/>

@component('mail::button', ['url' => 'https://www.google.com/maps/dir/'.$alerta->latitud.','. $alerta->longitud])
Ver En Google Maps
@endcomponent

@endcomponent