<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Confirmar Correo!</title>
</head>
<body>
    <h3>Buen día! {{$usuario->nombre.' '.$usuario->apellido}}</h3>
    <p>Gracias por seguir contribuyendo en Alertas UMG. </p>

    <p>Has cambiado tu correo electrónico, para verificarlo solo ingresa al siguiente enlace:</p>
   
    <ul>
        <li>
            <a href="{{route('verificar', $usuario->token_verificacion)}}">
                Confirmar
            </a>
        </li>
    </ul>
</body>
</html>