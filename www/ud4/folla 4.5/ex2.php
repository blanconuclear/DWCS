<?php
// Establece la cookie siempre que se cargue la página
if (isset($_POST['btn_enviar'])) {
    // Establece la cookie con el nombre y valor proporcionados en el formulario
    // El valor de la cookie expirará en 1 hora (3600 segundos)
    setcookie($_POST['nome'], $_POST['valor']);
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
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="valor" placeholder="Valor" required>
        <button type="submit" name="btn_enviar">Gardar</button>
    </form>

</body>

</html>