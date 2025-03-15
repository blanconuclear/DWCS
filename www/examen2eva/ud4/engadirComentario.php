<?php
session_start();    
require_once 'Conexion.php';

if (isset(($_POST['btnEnviarComentario']))) {

$comentario=$_POST['comentario'];
$usuario=$_SESSION['usuario']['usuario'];


$pdo = new Conexion();
$sql= "INSERT INTO `comentarios`(`usuario`, `comentario`) VALUES (:usuario,:comentario)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':usuario'=>$usuario,
    ':comentario'=> $comentario
]);


header('Location: mostra.php');
exit(); 
}