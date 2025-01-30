<?php
// Establece la cookie siempre que se cargue la página
if (isset($_POST['btn_enviar'])) {
    // Establece la cookie con el nombre y valor proporcionados en el formulario
    // El valor de la cookie expirará en 1 hora (3600 segundos)
    setcookie($_POST['nome'], $_POST['valor'], time() + 2000);
}

// Verifica si se ha presionado el botón de borrar (con el nombre 'btn_borrar')
if (isset($_POST['btn_borrar'])) {

    // Recorre todas las cookies almacenadas en $_COOKIE
    foreach ($_COOKIE as $nome => $valor) {

        // Borra la cookie configurando su valor a una cadena vacía ("") 
        // y su fecha de expiración a un tiempo pasado (3000 segundos en el pasado, aproximadamente 50 minutos antes).
        // Esto indica que la cookie ha expirado y, por lo tanto, será eliminada en la siguiente carga de la página.
        setcookie($nome, "", time() - 3000);
    }
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
        // $_COOKIE contiene todas las cookies enviadas por el navegador
        foreach ($_COOKIE as $nome => $valor) {
            // Muestra cada cookie con su nombre y valor
            echo "<li>$nome: $valor</li>";
        }
        ?>
    </ul>

    <h2>Engadir Cookie</h2>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="valor" placeholder="Valor">
        <button type="submit" name="btn_enviar">Gardar</button>
        <button type="submit" name="btn_borrar">Borrar</button>
    </form>

</body>

</html>