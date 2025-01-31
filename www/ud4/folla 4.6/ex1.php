<?php
session_start(); // Iniciar sesión
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Sesión 1A</title>
</head>

<body>
    <br />
    <!-- DEFINIMOS UNA VARIABLE -->
    <?php
    $_SESSION['usuario'] = "Xan"; // Corrección de comillas
    ?>
    <h2>Estou na páxina 1a!!</h2>
    <p><strong>ID de sesión en sesion1a.php:</strong> <?php echo session_id(); ?></p> <!-- Muestra ID de sesión -->
</body>

</html>