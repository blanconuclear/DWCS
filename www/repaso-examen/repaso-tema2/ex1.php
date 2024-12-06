<?php
// Incluimos el archivo con las pinturas
include_once "pinturas.php";

// Función para ordenar por el nombre del autor
function ordenarNomeAutor($pinturas)
{
    uasort($pinturas, function ($a, $b) {
        return strcmp($a[0], $b[0]); // Comparar cadenas alfabéticamente
    });
    return $pinturas;
}

function ordenarPorPintura($pinturas)
{
    uksort($pinturas, function ($a, $b) {
        return strcmp($a, $b);
    });
    return $pinturas;
}

function ordenarCronoloxicamente($pinturas)
{
    uasort($pinturas, function ($a, $b) {
        return $a[1] - $b[1];
    });
    return $pinturas;
}

function ordenar_cronoloxicamenteDescendente($pinturas)
{
    uasort($pinturas, function ($a, $b) {
        return $b[1] - $a[1];
    });
    return $pinturas;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Pinturas</title>
</head>

<body>

    <form action="" method="get">
        <button name="listado_completo">Listado Completo</button>
        <button name="ordenar_nome_autor">Ordenar por Nome do Autor</button>
        <button name="ordenar_nome_pintura">Ordenar por Nome da Pintura</button>
        <button name="ordenar_cronoloxicamente">Ordenar Cronoloxicamente Ascendente</button>
        <button name="ordenar_cronoloxicamenteDescendente">Ordenar Cronoloxicamente Descendente</button>
        <button name="pasar_maiusculas">Pasar a Maiúsculas</button>
        <button name="pasar_minusculas">Pasar a Minúsculas</button>
        <button name="eliminar_espazos">Eliminar Espazos</button>
        <button name="cambiar_letra">Cambiar Letra</button>

        <label for="buscar_palabra_titulo">Buscar palabra no título:</label>
        <input type="text" name="buscar_palabra_titulo">
        <label for="buscar_palabra_autor">Buscar palabra no autor:</label>
        <input type="text" name="buscar_palabra_autor">
        <button name="buscar_palabra">Buscar</button>
    </form>

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
                echo "<td>" . $cuadro . "</td>";
                echo "<td>" . $info[0] . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
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
                echo "<td>" . strtoupper($cuadro) . "</td>";
                echo "<td>" . strtoupper($info[0]) . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        // Pasar a minúsculas
        if (isset($_GET['pasar_minusculas'])) {
            foreach ($pinturas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . strtolower($cuadro) . "</td>";
                echo "<td>" . strtolower($info[0]) . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        // Eliminar espacios
        if (isset($_GET['eliminar_espazos'])) {
            foreach ($pinturas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . str_replace(" ", "", $cuadro) . "</td>";
                echo "<td>" . $info[0] . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        // Cambiar letra
        if (isset($_GET['cambiar_letra'])) {
            foreach ($pinturas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . str_replace("o", "u", $cuadro) . "</td>";
                echo "<td>" . str_replace("o", "u", $info[0]) . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        // Buscar palabra en título o autor
        if (isset($_GET['buscar_palabra'])) {
            $buscar_titulo = $_GET['buscar_palabra_titulo'] ?? '';
            $buscar_autor = $_GET['buscar_palabra_autor'] ?? '';

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

</body>

</html>