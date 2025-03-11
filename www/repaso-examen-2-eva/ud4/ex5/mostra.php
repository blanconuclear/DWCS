<?php
session_start();

$nome = $_SESSION['usuario']['nome'];
$idioma = $_COOKIE['idioma'];
$mensajes = [
    'galego' => "que pasa meu, $nome",
    'ingles' => "welcome, $nome"
];


echo htmlspecialchars($mensajes[$idioma]);

header('Location: pechaSesion.php');
