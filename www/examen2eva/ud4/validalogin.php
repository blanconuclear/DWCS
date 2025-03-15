<?php
session_start();
require_once 'Conexion.php';

$pdo = new Conexion();

$usuario=$_POST['usuario'];
$contrasinal=$_POST['contrasinal'];


$sql="select * from usuarios where usuario = :usuario";
$stmt = $pdo->prepare($sql);
$stmt->execute([':usuario'=>$usuario]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);



if($resultado && password_verify($contrasinal, $resultado['contrasinal'])){
    
    session_regenerate_id(true);

    $_SESSION['usuario'] = [
        'usuario'=> $resultado['usuario']
    ];

    header('Location: mostra.php');
    exit();


}else{
    header('Location: login.php');
    exit();
}