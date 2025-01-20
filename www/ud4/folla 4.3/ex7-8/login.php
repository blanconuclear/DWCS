<?php
require_once "conexion.php";

if (!isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])) {
    header("WWW-Authenticate: Basic realm='Contido restrinxido'");
    header("HTTP/1.0 401 Unauthorized");
    die("Acceso denegado.");
}

$nomeTecleado = $_SERVER['PHP_AUTH_USER'];
$passTecleado = $_SERVER['PHP_AUTH_PW'];

// Consultar la base de datos
$query = "SELECT contrasinal FROM usuario WHERE nome = :nome";
$stmt = $pdo->prepare($query);
$stmt->execute([':nome' => $nomeTecleado]);

// Verificar si el usuario existe y la contraseña es válida
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
print_r($resultado);

if ($resultado && password_verify($passTecleado, $resultado['contrasinal'])) {
    echo "Usuario registrado";
} else {
    echo "Usuario no registrado";
}
