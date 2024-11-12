<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="">

        <label for="apelido">Apelido: </label>
        <input type="text" name="apelido">

        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>

</html>

<?php
$servidor = "dbXdebug";
$usuario = "root";
$passwd = "root";
$base = "misPruebas";

// CONECTAMOS
$conexion = new mysqli($servidor, $usuario, $passwd, $base);
if ($conexion->connect_error) {
    die("Non é posible conectar coa BD: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");

$sentencia = $conexion->prepare("SELECT * FROM cliente where nome = ?");
$nome = "Xan"; //OU $_GET[‘nome’] SE VIMOS DUN FORMULARIO
$sentencia->bind_param("s", $nome);
$sentencia->execute();
$resultado = $sentencia->get_result();


while ($fila = $resultado->fetch_array(MYSQLI_BOTH))
    echo $fila['codCliente'] . " " . $fila['nome'] . " " . $fila['apelidos'];
$sentencia->close();
$conexion->close();


?>