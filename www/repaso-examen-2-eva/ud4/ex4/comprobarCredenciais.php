<?php
session_start();
require_once 'conexion.php';


$nome = $_POST['nome'];
$pass = $_POST['pass'];
$idioma = $_POST['selectIdioma'];



setcookie('idioma', $idioma, time() + 30000);


$sql = "select * from usuariosTempo where nome = :nome";
$stmt = $pdo->prepare($sql);
$stmt->execute(['nome' => $nome]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado && password_verify($pass, $resultado['passwd'])) {

    // Regenerar el ID de sesión para evitar fijación de sesión
    session_regenerate_id(true);

    $_SESSION['usuario'] = [
        'nome' => $resultado['nome'],
        'rol' => $resultado['rol']
    ];

    // Actualizar última conexión
    $sql = "UPDATE usuariosTempo SET ultimaconexion = NOW() WHERE nome = :nome";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nome' => $nome]);

    header("Location: mostra.php");
    exit();
} else {
    echo "Error: Usuario o contraseña incorrectos.";
}
