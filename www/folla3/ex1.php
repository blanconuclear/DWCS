<?php

$arrayNumeros = array($_GET['numero1'], $_GET['numero2'], $_GET['numero3'], $_GET['numero4'], $_GET['numero5']);

for ($i = 0; $i < count($arrayNumeros); $i++) {
    echo $arrayNumeros[$i] . "<br>";
}

//Suma
$suma = array_sum($arrayNumeros);
echo "La suma es: " . $suma;
echo "<br>";

//Outra forma de sum:
$suma = 0;

// Usar un bucle for para sumar los valores
for ($i = 0; $i < count($arrayNumeros); $i++) {
    $suma += $arrayNumeros[$i]; // Sumar cada número al total
}
echo "La suma es: " . $suma;
echo "<br>";

//Multiplicación
$producto = 1; // Empezar con 1 para la multiplicación

// Usar un bucle for para multiplicar los valores
for ($i = 0; $i < count($arrayNumeros); $i++) {
    $producto *= $arrayNumeros[$i]; // Multiplicar cada número al total
}

// Imprimir el resultado
echo "El producto es: " . $producto;

//Máximo-Mínimo
$max = max($arrayNumeros);
$min = min($arrayNumeros);

echo "<br>";
echo "El número mayor es: " . $max;
echo "<br>";
echo "El número menor es: " . $min;
