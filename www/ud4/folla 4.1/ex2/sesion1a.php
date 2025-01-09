<?php
session_start();

// Comprobar se hai datos gardados na sesión
if (isset($_SESSION['datos'])) {
    echo "<h2>Datos gardados na sesión:</h2>";
    echo "Nome de usuario: " . $_SESSION['datos']['nome'] . "<br>";
    echo "Contrasinal: " . $_SESSION['datos']['contrasinal'] . "<br>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Formulario de Login</title>
</head>

<body>

    <form action="sesion1b.php" method="get">
        <input type="text" placeholder="usuario" name="usuario">
        <input type="password" placeholder="pass" name="pass">
        <button name="btn-enviar">Enviar</button>
    </form>

</body>

</html>