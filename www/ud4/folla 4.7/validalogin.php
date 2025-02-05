<?php
session_start();
require_once "conexion.php";


$nomeUsuario = $_POST['nomeUsuario'];
$contrasinal = $_POST['contrasinal'];

$sql = "SELECT * FROM usuarios WHERE nomeUsuario=:nomeUsuario";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nomeUsuario' => $nomeUsuario
]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);


if ($resultado && password_verify($contrasinal, $resultado['contrasinal'])) {
    $_SESSION['usuario'] = [
        'nomeUsuario' => $resultado['nomeUsuario'],
        'rol' => $resultado['rol']
    ];

    header("Location: mostra.php");
} else {
    echo "Nome de usuario ou contrasinal incorrecto.";
}
