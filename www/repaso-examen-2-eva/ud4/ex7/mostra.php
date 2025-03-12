<?php
session_start();

$nome = $_SESSION['usuario']['nome'];
$idioma = $_COOKIE['idioma'];

$mensajes = [
    'galego' => "boas, $nome",
    'ingles' => "welcome, $nome"
];


echo htmlspecialchars($mensajes[$idioma]);
