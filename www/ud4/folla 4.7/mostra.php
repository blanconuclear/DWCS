<?php
session_start();
require_once 'conexion.php';

echo $_SESSION['usuario']['nomeUsuario'];
echo "<br>";
echo $_SESSION['usuario']['rol'];
