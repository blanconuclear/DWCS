<?php
// Verificamos si el navegador ha enviado las credenciales del usuario
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    // Si no se enviaron credenciales, enviamos un encabezado para pedir autenticación

    // El encabezado WWW-Authenticate indica al navegador que solicite usuario y contraseña
    header('WWW-Authenticate: Basic realm="Acceso restrinxido"');

    // Este encabezado HTTP indica que la solicitud está "No autorizada" (401 Unauthorized)
    header('HTTP/1.0 401 Unauthorized');

    // Mensaje que se mostrará si el usuario cancela la autenticación o no proporciona credenciales
    echo 'Requerida autenticación para acceder a esta páxina.';

    // Terminamos la ejecución del script, ya que no tiene sentido continuar
    exit;
} else {
    // Si las credenciales fueron enviadas, mostramos la información ingresada

    // Mostramos el nombre de usuario que fue enviado por el navegador
    echo "<p>Introduciches como nome de usuario: {$_SERVER['PHP_AUTH_USER']}.</p>";

    // Mostramos la contraseña que fue enviada por el navegador
    // ¡Nota! Mostrar la contraseña directamente no es seguro en un entorno real
    echo "<p>Introduciches como contrasinal: {$_SERVER['PHP_AUTH_PW']}</p>";
}
