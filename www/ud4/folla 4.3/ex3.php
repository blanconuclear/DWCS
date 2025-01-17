<?php
// Verificamos si las credenciales (usuario y contraseña) no están definidas 
// o si las credenciales proporcionadas no coinciden con las esperadas
if ((!isset($_SERVER['PHP_AUTH_USER'])) ||  // Si el usuario no envió nombre de usuario
    ($_SERVER['PHP_AUTH_USER'] != "Xan") || // O el nombre de usuario no es "Xan"
    ($_SERVER['PHP_AUTH_PW'] != "auga2")    // O la contraseña no es "auga2"
) {
    // Si alguna de las condiciones anteriores es verdadera, se solicita autenticación

    // Este encabezado indica al navegador que debe solicitar al usuario su nombre y contraseña
    header('WWW-Authenticate: Basic realm="Acceso restrinxido"');

    // Este encabezado envía un código HTTP 401 Unauthorized al navegador
    header('HTTP/1.0 401 Unauthorized');

    // Mostramos un mensaje informando que se requiere autenticación
    echo 'Requerida autenticación para acceder a esta páxina.';

    // Terminamos la ejecución del script
    exit;
}
?>

<html>

<head>
    <title>Exemplo de autenticación http</title>
</head>

<body>
    Conseguiu o acceso a zona restrinxida</B>.
</body>

</html>