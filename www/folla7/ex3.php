<?php
// Capturamos a cadea introducida e a función seleccionada
$texto = isset($_POST['cadena']) ? $_POST['cadena'] : ''; // Capturamos la cadena correctamente
$funcion = isset($_POST['funcion']) ? $_POST['funcion'] : ''; // Capturamos la función correctamente

// Engadimos comiñas ao redor da cadea para mostrar os espazos
$texto_mostrado = '"' . htmlspecialchars($texto) . '"'; // Escapamos para seguridad
$resultado = '';

// Dependendo da función seleccionada, aplicamos a función correspondente
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
        $resultado = 'Función no válida'; // Mensaje de error si la función no es válida
}

// Mostramos os resultados
echo "<h2>Resultados</h2>";
echo "<p>Cadea introducida: $texto_mostrado</p>";
echo "<p>Función aplicada: $funcion()</p>";
echo "<p>Cadea despois de serlle aplicada a función: \"" . htmlspecialchars($resultado) . "\"</p>";
