<?php
session_start();

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
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    $query = $conexion->prepare("SELECT id, nombre, pass FROM login WHERE mail = ?");
    $query->bind_param("s", $mail);
    $query->execute();
    $resultado = $query->get_result();

    $usuario = $resultado->fetch_assoc();

    if ($usuario && password_verify($pass, $usuario['pass'])) {
        $_SESSION['user_id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];

        header("Location: listado.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Contraseña incorrecta o usuario no encontrado.</div>";
    }

    $query->close();
}

$conexion->close();
