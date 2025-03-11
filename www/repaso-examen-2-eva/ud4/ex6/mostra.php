<?php
session_start();

$nome = $_SESSION['usuario']['nome'];
$idioma = $_COOKIE['idioma'];

$mensaje = [
    'ingles' => "hello $nome",
    'galego' => "boas $nome"
];


echo htmlspecialchars($mensaje[$idioma]);
