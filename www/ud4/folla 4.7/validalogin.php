<?php
session_start();
require_once "conexion.php";


$nomeUsuario = $_POST['nomeUsuario'];
$contrasinal = $_POST['contrasinal'];
$idioma = $_POST['idioma'];

$sql = "SELECT * FROM usuarios WHERE nomeUsuario=:nomeUsuario";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nomeUsuario' => $nomeUsuario
]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);


if ($resultado && password_verify($contrasinal, $resultado['contrasinal'])) {
    $_SESSION['usuario'] = [
        'nomeUsuario' => $resultado['nomeUsuario'],
        'rol' => $resultado['rol'],
        'idUsuario' => $resultado['id']
    ];

    $fecha = date('Y-m-d H:i:s');
    $updateSql = "UPDATE usuarios SET ultimaConexion = :ultimaConexion WHERE id = :id";
    $pdo->prepare($updateSql)->execute([':ultimaConexion' => $fecha, ':id' => $resultado['id']]);


    setcookie('idioma', $idioma, time() + 300, '/');

    header("Location: mostra.php");
} else {
    echo "Nome de usuario ou contrasinal incorrecto.";
}
