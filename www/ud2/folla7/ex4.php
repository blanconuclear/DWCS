<?php
// Capturamos la cadena introducida y la función seleccionada
$texto = isset($_POST['cadena']);
$funcion = isset($_POST['funcion']);

// Agregamos comillas alrededor de la cadena para mostrar los espacios
$texto_mostrado = '"' . $texto . '"'; // Mostramos la cadena sin escapado
$resultado = '';

// Dependiendo de la función seleccionada, aplicamos la función correspondiente
switch ($funcion) {
    case 'strtoupper':
        $resultado = strtoupper($texto); // Convierte la cadena a mayúsculas
        break;
    case 'strtolower':
        $resultado = strtolower($texto); // Convierte la cadena a minúsculas
        break;
    case 'ucwords':
        $resultado = ucwords($texto); // Convierte la primera letra de cada palabra a mayúscula
        break;
    default:
        $resultado = 'Función no válida';
}

// Mostramos los resultados
echo "<h2>Resultados</h2>";
echo "<p>Cadea introducida: $texto_mostrado</p>"; // Muestra la cadena introducida
echo "<p>Función aplicada: $funcion()</p>"; // Muestra la función seleccionada
echo "<p>Cadea despois de serlle aplicada a función: \"$resultado\"</p>"; // Muestra el resultado
