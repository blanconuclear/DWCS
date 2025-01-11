<?php
session_start();
require_once "conexion.php";

// Verifica si se envió el formulario
if (isset($_POST['btn_enviar_crear'])) {
    // Obtención de datos del formulario
    $crear_numero = $_POST['crear_numero'];
    $crear_nome = $_POST['crear_nome'];
    $crear_num_empregado_asig = $_POST['crear_num_empregado_asig'];
    $crear_limite_de_credito = $_POST['crear_limite_de_credito'];

    // Preparar la consulta de inserción
    $sql = "INSERT INTO cliente (numero, nome, num_empregado_asignado, limite_de_credito)
                    VALUES (:numero, :nome, :num_empregado_asignado, :limite_de_credito)";
    $stmt = $pdo->prepare($sql);

    // Ejecutar la consulta con los datos
    $stmt->execute([
        ':numero' => $crear_numero,
        ':nome' => $crear_nome,
        ':num_empregado_asignado' => $crear_num_empregado_asig,
        ':limite_de_credito' => $crear_limite_de_credito,
    ]);

    // Redirigir a la página "datos.php" después de insertar
    header("Location: datos.php");
    exit(); // Asegura que no se ejecute el código posterior
}

$mensageSaludar = "Hola " . $_SESSION['datos']['nome'] . " aquí puedes crear un cliente!";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente</title>
</head>

<body>
    <h1>Agregar Cliente</h1>
    <p><?php echo $mensageSaludar; ?></p>
    <form method="post">
        <label for="crear_numero">Número:</label>
        <input type="text" name="crear_numero" /><br>

        <label for="crear_nome">Nome:</label>
        <input type="text" name="crear_nome" /><br>

        <label for="crear_num_empregado_asig">Num_empregado_asig:</label>
        <input type="text" name="crear_num_empregado_asig" /><br>

        <label for="crear_limite_de_credito">Limite de crédito:</label>
        <input type="text" name="crear_limite_de_credito" /><br>

        <button type="submit" name="btn_enviar_crear">Enviar</button>
    </form>
</body>

</html>