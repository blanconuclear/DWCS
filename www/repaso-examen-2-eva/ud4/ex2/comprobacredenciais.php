<?php
session_start();
require_once 'conexion.php';

$nome = $_POST['nome'];
$pass = $_POST['pass'];
$idioma = $_POST['SelectIdioma'];  // Capturar el idioma seleccionado

// Guardar el idioma en una cookie por 30 días
setcookie("idioma", $idioma, time() + 2592000);

$sql = "select * from usuariosTempo where nome = :nome";
$stmt = $pdo->prepare($sql);
$stmt->execute([':nome' => $nome]);

//ACORDARSE DE QUE AL SER UNO SOLO ES FETCH Y NO FECTHALL
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado && password_verify($pass, $resultado['passwd'])) {

    $_SESSION['usuario'] = [
        'nome' => $resultado['nome'],
        'rol' => $resultado['rol'],
        'ultimaconexion' => $resultado['ultimaconexion']
    ];

    $sql = "UPDATE usuariosTempo SET ultimaconexion = NOW() WHERE nome = :nome";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nome' => $nome]);

    header("Location: mostra.php");
    exit();
}
