<?php
// Capturamos a cadea introducida e a función seleccionada
$texto = isset($_POST['texto']);
$funcion = isset($_POST['funcion']);

// Engadimos comiñas ao redor da cadea para mostrar os espazos
$texto_mostrado = '"' . $texto . '"';
$resultado = '';

// Dependendo da función seleccionada, aplicamos a función correspondente
switch ($funcion) {
    case 'chop':
        $resultado = chop($texto); // Elimina o último carácter
        break;
    case 'ltrim':
        $resultado = ltrim($texto); // Elimina espazos á esquerda
        break;
    case 'trim':
        $resultado = trim($texto); // Elimina espazos ao redor
        break;
    case 'strip_tags':
        $resultado = strip_tags($texto); // Elimina etiquetas HTML
        break;
    case 'strtoupper':
        $resultado = strtoupper($texto); // Convierte a cadena a mayúsculas
        break;
    default:
        $resultado = 'Función non válida';
}

// Mostramos os resultados
echo "<h2>Resultados</h2>";
echo "<p>Cadea introducida: $texto_mostrado</p>";
echo "<p>Función aplicada: $funcion()</p>";
echo "<p>Cadea despois de serlle aplicada a función: \"$resultado\"</p>";
