<?php

$arrayNumeros = array();

for ($i = 1; $i <= 2; $i++) {
    $arrayNumeros[$i - 1] = $_GET["numero$i"];
}

for ($i = 3; $i <= 5; $i++) {
    $arrayNumeros[] = $_GET["numero$i"];
}

foreach ($arrayNumeros as $indice => $valor) {
    echo "Índice: $indice, Valor: $valor<br>";
}
