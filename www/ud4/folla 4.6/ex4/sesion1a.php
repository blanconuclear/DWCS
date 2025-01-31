<?php
session_start(); // Iniciar sesión

// Comprobar si la variable de sesión 'primera_sesion' está definida
if (!isset($_SESSION['primera_sesion'])) {
    $_SESSION['primera_sesion'] = true;  // Definir variable 'primera_sesion' al crear la sesión
    session_regenerate_id(true); // Regenerar el Session ID cuando se crea la sesión por primera vez
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Sesión 1A</title>
</head>

<body>
    <br />
    <!-- Muestra el ID de sesión para verificar si ha cambiado -->
    <p><strong>ID de sesión en sesion1a.php:</strong> <?php echo session_id(); ?></p>

    <h2>Estou na páxina 1a!!</h2>
    <a href="sesion1b.php">Ir a sesion1b</a>
</body>

</html>