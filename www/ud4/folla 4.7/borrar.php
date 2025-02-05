<?php
//engadirComentario.php

session_start();
if (!isset($_SESSION['idUsuario']) || $_SESSION['rol'] != 'usuario') {
    header("Location: login.php");
    exit();
}

$servername = "dbXdebug";
$username = "tarefa";
$password = "Tarefa4.7";
$dbname = "tarefa4.7";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $idUsuario = $_SESSION['idUsuario'];
    $idProduto = $_POST['idProduto'];
    $comentario = $_POST['comentario'];

    $stmt = $conn->prepare("INSERT INTO comentarios (idUsuario, idProduto, Comentario) VALUES (:idUsuario, :idProduto, :comentario)");
    $stmt->bindParam(':idUsuario', $idUsuario);
    $stmt->bindParam(':idProduto', $idProduto);
    $stmt->bindParam(':comentario', $comentario);
    $stmt->execute();

    header("Location: mostra.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;


//moderarComentario.php

session_start();
if (!isset($_SESSION['idUsuario']) || $_SESSION['rol'] != 'moderador') {
    header("Location: login.php");
    exit();
}

$servername = "dbXdebug";
$username = "tarefa";
$password = "Tarefa4.7";
$dbname = "tarefa4.7";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $idComentario = $_POST['idComentario'];
    $accion = $_POST['accion'];

    if ($accion == 'Aprobar') {
        $stmt = $conn->prepare("UPDATE comentarios SET moderado = 'si', dataModeracion = NOW() WHERE idComentario = :idComentario");
    } else {
        $stmt = $conn->prepare("DELETE FROM comentarios WHERE idComentario = :idComentario");
    }
    $stmt->bindParam(':idComentario', $idComentario);
    $stmt->execute();

    header("Location: mostra.php");
} catch (PDOException $e) {
}
