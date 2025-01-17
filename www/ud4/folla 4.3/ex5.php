<?php
// Verificamos si el navegador envió las credenciales
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    // Pedimos autenticación si no se han enviado credenciales
    header('WWW-Authenticate: Basic realm="Acceso restrinxido"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Autorización requerida.';
    exit;
} else {
    // Leemos el archivo de usuarios
    $fich = file("usuarios.txt");
    $validado = false;

    // Recorremos las líneas del archivo con un bucle for
    for ($i = 0; $i < count($fich); $i++) {
        // Dividimos cada línea en usuario y contraseña usando "?"
        $campo = explode("?", rtrim($fich[$i]));

        // Comprobamos si las credenciales coinciden
        if (($_SERVER['PHP_AUTH_USER'] == $campo[0]) && ($_SERVER['PHP_AUTH_PW'] == $campo[1])) {
            $validado = true; // Credenciales válidas
            $usuario = $campo[0]; // Guardamos el usuario
            $contrasinal = $campo[1]; // Guardamos la contraseña
            break; // Salimos del bucle
        }
    }

    // Si las credenciales no son válidas
    if (!$validado) {
        header('WWW-Authenticate: Basic realm="Acceso restrinxido"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Autorización requerida.';
        exit;
    } else {
        // Si las credenciales son correctas, mostramos la página restringida
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8" />
            <title>Autenticación HTTP</title>
        </head>

        <body>
            <h1>Zona restrinxida</h1>
            <p>Accediches con éxito como usuario: <strong><?php echo htmlspecialchars($usuario); ?></strong></p>
            <p>A túa contrasinal é: <strong><?php echo htmlspecialchars($contrasinal); ?></strong></p>
        </body>

        </html>
<?php
    }
}
?>