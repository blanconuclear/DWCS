<?php
// Capturamos la cadena introducida y la función seleccionada
$texto = isset($_POST['cadena']) ? $_POST['cadena'] : '';
$funcion = isset($_POST['funcion']) ? $_POST['funcion'] : '';


$texto_mostrado = '"' . str_replace(" ", "*", $texto) . '"';
$resultado = '';

switch ($funcion) {
    case 'chop':
        // es un alias de rtrim() en PHP, eliminando espacios en blanco al final
        $resultado = chop($texto);
        break;
    case 'ltrim':
        // elimina los espacios en blanco del principio de la cadena
        $resultado = ltrim($texto);
        break;
    case 'trim':
        // elimina espacios en blanco tanto del principio como del final de la cadena
        $resultado = trim($texto);
        break;
    case 'strip_tags':
        // elimina cualquier etiqueta HTML o PHP de la cadena
        $resultado = strip_tags($texto);
        break;
    default:
        $resultado = 'Función no válida';
}

// Mostramos los resultados
echo "<h2>Resultados</h2>";
echo "<p>Cadea introducida: $texto_mostrado</p>";
echo "<p>Función aplicada: $funcion()</p>";
echo "<p>Cadea despois de serlle aplicada a función: \"" . $resultado . "\"</p>";
