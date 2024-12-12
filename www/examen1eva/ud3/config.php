<?php
$servidor="dbmysql";
$usuario="root";
$pass="root";
$bbdd="maqueta";


try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$bbdd",$usuario,$pass);
  //  echo "conexion ok";
} catch (Exception $e) {
    echo "erro na conexion".$e->getMessage()."";
}

?>