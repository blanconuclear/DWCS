<?php
session_start();    
require_once 'Conexion.php';
$usuario=$_SESSION['usuario']['usuario'];
$idioma=$_COOKIE['idioma'];
$mensaxe=[
  'galego'=>"ola, $usuario !",
  'ingles'=>"welcome, $usuario !"
];

if (!isset($_COOKIE['idioma'])){

  header('Location: login.php');
  exit();
}else{

  echo $mensaxe[$idioma];

  $pdo = new Conexion();
  $sql= "select * from comentarios where usuario = :usuario";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':usuario'=> $usuario
  ]);
  $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);


 foreach ($resultado as $comentario) {
  $usuario=htmlspecialchars($comentario["usuario"]);
  $comentario=htmlspecialchars($comentario["comentario"]);

  echo "
  <h3>$usuario</h3>
  <p>$comentario</p>
  ";
 }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="engadirComentario.php" method="post">
    <input type="text" name="comentario" placeholder="comentario">
    <button name="btnEnviarComentario">enviar comentario</button>
  </form>

  <a href="pecharSesion.php">pechar sesion</a>
</body>
</html>
   
