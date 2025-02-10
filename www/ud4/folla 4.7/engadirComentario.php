<?php
session_start();
require_once 'conexion.php';

$nomeUsuario = $_SESSION['usuario']['nomeUsuario'];
$idProduto = $_POST['idProduto'];
$comentario = $_POST['comentario'];

$sql = "INSERT INTO comentarios (usuario, idProduto, Comentario, dataCreacion, moderado) 
VALUES (:usuario, :idProduto, :comentario, NOW(), 'non')";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':usuario' => $nomeUsuario,
    ':idProduto' => $idProduto,
    ':comentario' => $comentario
]);

header("Location: mostra.php");
