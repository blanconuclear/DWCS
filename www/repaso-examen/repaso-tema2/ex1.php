<?php
// Incluimos el archivo con las pinturas
include_once "pinturas.php"; // Este archivo contiene el array $pinturas con la información de las pinturas

// Función para ordenar por el nombre del autor
function ordenarNomeAutor($pinturas)
{
    uasort($pinturas, function ($a, $b) {
        return strcmp($a[0], $b[0]); // Compara alfabéticamente el nombre de los autores
    });
    return $pinturas; // Devuelve el array ordenado
}

// Función para ordenar por el nombre del cuadro (clave del array)
function ordenarPorPintura($pinturas)
{
    uksort($pinturas, function ($a, $b) {
        return strcmp($a, $b); // Compara alfabéticamente las claves (nombres de los cuadros)
    });
    return $pinturas; // Devuelve el array ordenado
}

// Función para ordenar cronológicamente (por año, de menor a mayor)
function ordenarCronoloxicamente($pinturas)
{
    uasort($pinturas, function ($a, $b) {
        return $a[1] - $b[1]; // Compara los años numéricamente
    });
    return $pinturas; // Devuelve el array ordenado
}

// Función para ordenar cronológicamente de mayor a menor (descendente)
function ordenar_cronoloxicamenteDescendente($pinturas)
{
    uasort($pinturas, function ($a, $b) {
        return $b[1] - $a[1]; // Compara los años en orden inverso
    });
    return $pinturas; // Devuelve el array ordenado
}

$contador = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Pinturas</title>
</head>

<body>

    <!-- Formulario con botones para seleccionar la acción -->
    <form action="" method="get">
        <!-- Cada botón representa una acción distinta -->
        <button name="listado_completo">Listado Completo</button>
        <button name="ordenar_nome_autor">Ordenar por Nome do Autor</button>
        <button name="ordenar_nome_pintura">Ordenar por Nome da Pintura</button>
        <button name="ordenar_cronoloxicamente">Ordenar Cronoloxicamente Ascendente</button>
        <button name="ordenar_cronoloxicamenteDescendente">Ordenar Cronoloxicamente Descendente</button>
        <button name="pasar_maiusculas">Pasar a Maiúsculas</button>
        <button name="pasar_minusculas">Pasar a Minúsculas</button>
        <button name="eliminar_espazos">Eliminar Espazos</button>
        <button name="cambiar_letra">Cambiar Letra</button>

        <!-- Campos de texto para buscar palabras en el título o autor -->
        <label for="buscar_palabra_titulo">Buscar palabra no título:</label>
        <input type="text" name="buscar_palabra_titulo">
        <label for="buscar_palabra_autor">Buscar palabra no autor:</label>
        <input type="text" name="buscar_palabra_autor">
        <button name="buscar_palabra">Buscar</button>
    </form>

    <!-- Tabla para mostrar los resultados -->
    <table border="1px">
        <tr>
            <th>Cuadro</th>
            <th>Autor</th>
            <th>Año</th>
        </tr>

        <?php
        // Mostrar listado completo
        if (isset($_GET['listado_completo'])) {
            foreach ($pinturas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . $cuadro . "</td>"; // Nombre del cuadro
                echo "<td>" . $info[0] . "</td>"; // Autor
                echo "<td>" . $info[1] . "</td>"; // Año
                echo "</tr>";

                $contador++;
            }
        }

        // Ordenar por autor
        if (isset($_GET['ordenar_nome_autor'])) {
            $pinturas_ordenadas = ordenarNomeAutor($pinturas);
            foreach ($pinturas_ordenadas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . $cuadro . "</td>";
                echo "<td>" . $info[0] . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";

                $contador++;
            }
        }

        // Ordenar por pintura
        if (isset($_GET['ordenar_nome_pintura'])) {
            $pinturas_ordenadas = ordenarPorPintura($pinturas);
            foreach ($pinturas_ordenadas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . $cuadro . "</td>";
                echo "<td>" . $info[0] . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        // Ordenar cronológicamente ascendente
        if (isset($_GET['ordenar_cronoloxicamente'])) {
            $pinturas_ordenadas = ordenarCronoloxicamente($pinturas);
            foreach ($pinturas_ordenadas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . $cuadro . "</td>";
                echo "<td>" . $info[0] . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        // Ordenar cronológicamente descendente
        if (isset($_GET['ordenar_cronoloxicamenteDescendente'])) {
            $pinturas_ordenadas = ordenar_cronoloxicamenteDescendente($pinturas);
            foreach ($pinturas_ordenadas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . $cuadro . "</td>";
                echo "<td>" . $info[0] . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        // Pasar a mayúsculas
        if (isset($_GET['pasar_maiusculas'])) {
            foreach ($pinturas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . strtoupper($cuadro) . "</td>"; // Convierte el título a mayúsculas
                echo "<td>" . strtoupper($info[0]) . "</td>"; // Convierte el autor a mayúsculas
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        // Pasar a minúsculas
        if (isset($_GET['pasar_minusculas'])) {
            foreach ($pinturas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . strtolower($cuadro) . "</td>"; // Convierte el título a minúsculas
                echo "<td>" . strtolower($info[0]) . "</td>"; // Convierte el autor a minúsculas
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        // Eliminar espacios
        if (isset($_GET['eliminar_espazos'])) {
            foreach ($pinturas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . str_replace(" ", "", $cuadro) . "</td>"; // Elimina los espacios del título
                echo "<td>" . $info[0] . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        // Cambiar letra
        if (isset($_GET['cambiar_letra'])) {
            foreach ($pinturas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . str_replace("o", "u", $cuadro) . "</td>"; // Reemplaza "o" por "u" en el título
                echo "<td>" . str_replace("o", "u", $info[0]) . "</td>"; // Reemplaza "o" por "u" en el autor
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        // Buscar palabra en título o autor
        if (isset($_GET['buscar_palabra'])) {
            $buscar_titulo = $_GET['buscar_palabra_titulo'] ?? ''; // Palabra a buscar en el título
            $buscar_autor = $_GET['buscar_palabra_autor'] ?? ''; // Palabra a buscar en el autor

            foreach ($pinturas as $cuadro => $info) {
                $enTitulo = $buscar_titulo && strpos(strtolower($cuadro), strtolower($buscar_titulo)) !== false;
                $enAutor = $buscar_autor && strpos(strtolower($info[0]), strtolower($buscar_autor)) !== false;

                if ($enTitulo || $enAutor) {
                    echo "<tr>";
                    echo "<td>" . $cuadro . "</td>";
                    echo "<td>" . $info[0] . "</td>";
                    echo "<td>" . $info[1] . "</td>";
                    echo "</tr>";
                }
            }
        }
        ?>
    </table>

    <?php
    echo "Mostramos " . $contador . " filas de un total de " . count($pinturas);

    ?>
</body>

</html>