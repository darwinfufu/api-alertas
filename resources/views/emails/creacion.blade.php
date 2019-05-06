<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Confirmar Correo!</title>
</head>
<body>
    <h3>Buen día! {{$usuario->nombre.' '.$usuario->apellido}}</h3>
    <p>Gracias por crear tu cuenta en Alertas UMG y contribuir a la reducción de los robos y permitirnos actuar de forma más rápida y apropiada.</p>

    <p>Por favor verifica tu cuenta ingresando al siguiente enlace:</p>
   
    <ul>
        <li>
            <a href="{{ route('verificar', $usuario->token_verificacion) }}">
                Confirmar
            </a>
        </li>
    </ul>
</body>
</html>