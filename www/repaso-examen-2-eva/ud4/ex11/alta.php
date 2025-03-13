<?php
require_once 'conexion.php';

$nome = $_POST['nome'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$rol = $_POST['selectRol'];
$ultimaConexion = "1970-01-01 00:00:00";

$sql = "INSERT INTO `usuariosTempo`(`nome`, `passwd`, `ultimaconexion`, `rol`) VALUES (:nome,:pass,:ultimaconexion,:rol)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nome' => $nome,
    ':pass' => $pass,
    ':ultimaconexion' => $ultimaConexion,
    ':rol' => $rol
]);

header('Location: login.php');
exit();
