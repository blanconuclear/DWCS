<?php

$servidor = "dbXdebug";
$usuario = "root";
$passwd = "root";
$base = "misPruebas";

// CONECTAMOS
$conexion = new mysqli($servidor, $usuario, $passwd, $base);
if ($conexion->connect_error) {
    die("No es posible conectarse a la base de datos: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");

if (isset($_POST['btn-login'])) {

    // Obtener los valores del formulario
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    // Preparar la consulta para buscar al usuario por email
    $query = $conexion->prepare("SELECT id, nombre, pass FROM login WHERE mail = ?");
    $query->bind_param("s", $mail);
    $query->execute();
    $resultado = $query->get_result();

    $usuario = $resultado->fetch_array(MYSQLI_BOTH);

    // Verificar si se encontró el usuario
    if ($usuario && password_verify($pass, $usuario['pass'])) {
        echo "Bienvenido, " . $usuario['nombre'] . "!";
    } else {
        echo "Contraseña incorrecta o usuario no encontrado.";
    }


    $query->close();
}

$conexion->close();
