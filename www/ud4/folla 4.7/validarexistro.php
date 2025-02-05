<?php
require_once 'conexion.php';


$nomeUsuario = $_POST['nomeUsuario'];
$nomeCompleto = $_POST['nomeCompleto'];
$contrasinal = password_hash($_POST['contrasinal'], PASSWORD_DEFAULT);
$email = $_POST['email'];


$sql = "INSERT INTO usuarios(nomeUsuario, contrasinal, nomeCompleto, email) 
               VALUES (:nomeUsuario,:contrasinal,:nomeCompleto,:email)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nomeUsuario' => $nomeUsuario,
    ':contrasinal' => $contrasinal,
    ':nomeCompleto' => $nomeCompleto,
    ':email' => $email
]);

header("Location: login.php");
exit();
