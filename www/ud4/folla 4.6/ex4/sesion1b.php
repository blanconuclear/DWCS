<?php
session_start(); // Iniciar sesión
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Sesión 1B</title>
</head>

<body>
    <br />
    <!-- Mostrar el ID de sesión actual -->
    <p><strong>ID de sesión en sesion1b.php:</strong> <?php echo session_id(); ?></p>

    <h2>Estou na páxina 1b!!</h2>

    <!-- Botón para cerrar sesión -->
    <form action="pecheSesion.php" method="post">
        <button type="submit">Pechar sesión</button>
    </form>

    <br>
    <a href="sesion1a.php">Volver a sesion1a</a>
</body>

</html>