<?php
// conexion.php
$conexion = mysqli_connect("dbXdebug", "root", "root", "folla1");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
