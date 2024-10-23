<?php

// Capturar os valores do formulario
$n1 = isset($_GET['n1']) ? (int)$_GET['n1'] : 0;
$n2 = isset($_GET['n2']) ? (int)$_GET['n2'] : 0;
$n3 = isset($_GET['n3']) ? (int)$_GET['n3'] : 0;
$n4 = isset($_GET['n4']) ? (int)$_GET['n4'] : 0;

// Suma de 2, 3 ou 4 números
function suma2($n1, $n2)
{
    return $n1 + $n2;
}

function suma3($n1, $n2, $n3)
{
    return $n1 + $n2 + $n3;
}

function suma4($n1, $n2, $n3, $n4)
{
    return $n1 + $n2 + $n3 + $n4;
}

// Multiplicación de 2, 3 ou 4 números
function multiplicacio2($n1, $n2)
{
    return $n1 * $n2;
}

function multiplicacio3($n1, $n2, $n3)
{
    return $n1 * $n2 * $n3;
}

function multiplicacio4($n1, $n2, $n3, $n4)
{
    return $n1 * $n2 * $n3 * $n4;
}

// Función para obter o maior valor entre 4 números
function maior2($n1, $n2, $n3, $n4)
{
    return max($n1, $n2, $n3, $n4);
}

// Función para obter o menor valor entre 4 números
function menor2($n1, $n2, $n3, $n4)
{
    return min($n1, $n2, $n3, $n4);
}

// Calcular a media de 4 números
function media($n1, $n2, $n3, $n4)
{
    return ($n1 + $n2 + $n3 + $n4) / 4;
}

// Factorial dun número (n3)
function factorial($n3)
{
    $factorial = 1;
    for ($i = 1; $i <= $n3; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}

// Obter o segundo maior valor
function segundoMaior($n1, $n2, $n3, $n4)
{
    $array = array($n1, $n2, $n3, $n4);
    rsort($array);
    return $array[1];
}

// Ordear os números de maior a menor
function ordearMaiorMenor($n1, $n2, $n3, $n4)
{
    $numeros = [$n1, $n2, $n3, $n4];
    rsort($numeros);
    return implode(", ", $numeros);
}

// Ordear os números de menor a maior
function ordearMenorMaior($n1, $n2, $n3, $n4)
{
    $numeros = [$n1, $n2, $n3, $n4];
    sort($numeros);
    return implode(", ", $numeros);
}

// Verificar botón foi premedido e chamar función correspondente
if (isset($_GET['suma2'])) {
    echo "Resultado de suma2: " . suma2($n1, $n2);
} elseif (isset($_GET['suma3'])) {
    echo "Resultado de suma3: " . suma3($n1, $n2, $n3);
} elseif (isset($_GET['suma4'])) {
    echo "Resultado de suma4: " . suma4($n1, $n2, $n3, $n4);
} elseif (isset($_GET['multiplicacio2'])) {
    echo "Resultado de multiplicacio2: " . multiplicacio2($n1, $n2);
} elseif (isset($_GET['multiplicacio3'])) {
    echo "Resultado de multiplicacio3: " . multiplicacio3($n1, $n2, $n3);
} elseif (isset($_GET['multiplicacio4'])) {
    echo "Resultado de multiplicacio4: " . multiplicacio4($n1, $n2, $n3, $n4);
} elseif (isset($_GET['maior'])) {
    echo "Maior valor: " . maior2($n1, $n2, $n3, $n4);
} elseif (isset($_GET['menor'])) {
    echo "Menor valor: " . menor2($n1, $n2, $n3, $n4);
} elseif (isset($_GET['media'])) {
    echo "Media: " . media($n1, $n2, $n3, $n4);
} elseif (isset($_GET['factorial'])) {
    echo "Factorial de n3: " . factorial($n3);
} elseif (isset($_GET['segundoMaior'])) {
    echo "Segundo maior valor: " . segundoMaior($n1, $n2, $n3, $n4);
} elseif (isset($_GET['ordearMaiorMenor'])) {
    echo "Orde de maior a menor: " . ordearMaiorMenor($n1, $n2, $n3, $n4);
} elseif (isset($_GET['ordearMenorMaior'])) {
    echo "Orde de menor a maior: " . ordearMenorMaior($n1, $n2, $n3, $n4);
} else {
    echo "Operación non válida";
}
