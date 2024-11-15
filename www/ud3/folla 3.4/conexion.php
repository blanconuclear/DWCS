<?php
$servidor = "dbXdebug";
$usuario = "root";
$passwd = "root";
$base = "tendaInformatica";

// Conexión a la base de datos
$conexion = new mysqli($servidor, $usuario, $passwd, $base);
if ($conexion->connect_error) {
    die("No es posible conectar a la base de datos: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");
