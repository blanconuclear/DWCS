<?php
// Comprobar si el botón 'btn_enviar' ha sido presionado
if (isset($_GET['btn_enviar'])) {

    // Establecer las cookies con los valores proporcionados en el formulario
    setcookie("nome", $_GET['nome'], time() + 2000);
    setcookie("apelido", $_GET['apelido'], time() + 2000);
    setcookie("email", $_GET['email'], time() + 2000);

    // Redirigir para que las cookies sean accesibles en la siguiente carga de la página
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// Eliminar cookies cuando el botón 'btn_borrar' es presionado
if (isset($_GET['btn_borrar'])) {
    $borrar = $_GET['btn_borrar'];

    // Eliminar la cookie estableciendo un tiempo pasado
    setcookie($borrar, "", 1); // Establecer el tiempo en el pasado
    header('Location: ' . $_SERVER['PHP_SELF']); // Redirigir para actualizar la página
    exit();
}
?>

<!DOCTYPE html>
<html lang="gl">

<head>
    <meta charset="UTF-8">
    <title>Cookies</title>
</head>

<body>

    <h2>Cookies:</h2>
    <ul>
        <?php
        // Recorre todas las cookies almacenadas y las muestra en una lista
        foreach ($_COOKIE as $nome => $valor) {
            // Muestra cada cookie con su nombre y valor
            echo "<li>$nome: $valor</li>";
            // El formulario ahora pasa solo el nombre de la cookie, no su valor
            echo "<form method='GET'>
                    <button name='btn_borrar' value='$nome'>Borrar</button>
                  </form>";
        }
        ?>
    </ul>

</body>

</html>