<?php
session_start();
require_once "conexion.php";

$nome = $_POST['nome'];
$passwd = $_POST['passwd'];

// Preparar la consulta para buscar al usuario por nombre
$sql = "SELECT * FROM UsuariosTempo WHERE nome = :nome";
$stmt = $pdo->prepare($sql);
$stmt->execute([':nome' => $nome]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si el usuario existe y la contraseña es válida
if ($resultado && password_verify($passwd, $resultado['passwd'])) {
    $_SESSION['usuario'] = [
        'nome' => $resultado['nome'],
        'rol' => $resultado['rol']
    ];

    // Actualizar la última conexión
    $fecha = date('Y-m-d H:i:s');
    $updateSql = "UPDATE UsuariosTempo SET ultimaconexion = :ultimaConexion WHERE nome = :nome";
    $pdo->prepare($updateSql)->execute([':ultimaConexion' => $fecha, ':nome' => $nome]);

    // Redirigir al usuario a la página "mostra.php"
    header('Location: mostra.php');
    exit(); // Asegurarse de que el script termine después de redirigir
} else {
    echo "Usuario o contraseña incorrectos. <a href='login.php'>Intentar de nuevo</a>";
}
