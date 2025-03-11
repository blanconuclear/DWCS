<?php
require_once 'conexion.php';

$nome = $_POST['nome'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$roll = $_POST['rol'];
$ultimaconexion = '1970-01-01 00:00:00';


$sql = "INSERT INTO `usuariosTempo`(`nome`, `passwd`, `ultimaconexion`, `rol`) VALUES (:nome,:passwd,:ultimaconexion,:rol)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nome' => $nome,
    ':passwd' => $pass,
    ':ultimaconexion' => $ultimaconexion,
    ':rol' => $roll
]);

header('Location:login.php');
exit();
