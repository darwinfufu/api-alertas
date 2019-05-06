<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Alerta!</title>
</head>
<body>
    <p>Atención! Se recibió una nueva alerta con fecha y hora: {{ $alerta->created_at }}.</p>
    <h3>Datos del usuario que realizó la alerta:</h3>
    <ul>
        <li>Nombre: {{ $alerta->usuario->nombre.' '.$alerta->usuario->apellido}}</li>
        <li>Teléfono: {{ $alerta->telefono_usuario }}</li>
        <li>DPI: {{ $alerta->usuario->dpi }}</li>
        <li>Email: {{ $alerta->usuario->correo }}</li>
    </ul>
    <h3>Datos del reporte:</h3>
    <ul>
        <li>Descripción: {{ $alerta->descripcion }}</li>
        <li>Latitud: {{ $alerta->latitud }}</li>
        <li>Longitud: {{ $alerta->longitud }}</li>
        <li>
            <a href="https://www.google.com/maps/dir/{{ $alerta->latitud }},{{ $alerta->longitud }}">
                Ver en Google Maps
            </a>
        </li>
    </ul>
</body>
</html>