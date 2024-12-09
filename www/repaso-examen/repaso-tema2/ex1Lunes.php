<?php
include_once "pinturas.php";

$contador = 0;

//Funciones

//Ordenar nombre autor
function ordenarAutor($pinturas)
{
    uasort($pinturas, fn($a, $b) => strcmp($a[0], $b[0]));
    return $pinturas;
}

//ORdenar titulo
function ordenarTitulo($pinturas)
{
    uksort($pinturas, fn($a, $b) => strcmp($a, $b));
    return $pinturas;
}

//Ordenar año desc
function ordenarAnoDesc($pinturas)
{
    uasort($pinturas, fn($a, $b) => $b[1] - $a[1]);
    return $pinturas;
}

//Ordenar año asc
function ordenarAnoAsc($pinturas)
{
    uasort($pinturas, fn($a, $b) => $a[1] - $b[1]);
    return $pinturas;
}

//Pasa a maiúscula a primeira letra de cada palabra do título
function pasarMaiscula($pinturas)
{
    $pinturasMaisculas = [];
    foreach ($pinturas as $cuadro => $info) {
        $tituloMaisculas = ucwords($cuadro);
        $pinturasMaisculas[$tituloMaisculas] = $info;
    }
    return $pinturasMaisculas;
}

//Elimina os espazos dos títulos
function eliminarEspaciosTitulo($pinturas, &$contador)
{
    foreach ($pinturas as $cuadro => $info) {
        $tituloSinEspacios = str_replace(" ", "", $cuadro);
        echo
        "<tr>
        <td>$tituloSinEspacios</td>
        <td>$info[0]</td>
        <td>$info[1]</td>
        </tr>";

        $contador++;
    }
}

//Cambia a letra ‘o’ pola letra ‘u’ de todos os datos
function cambiarOporU($pinturas, &$contador)
{
    foreach ($pinturas as $cuadro => $info) {
        $tituloCambiado = str_replace("o", "u", $cuadro);
        $autorCambiado = str_replace("o", "u", $info[0]);
        $anoCambiado = str_replace("o", "u", $info[1]);

        echo "<tr>
    <td>$tituloCambiado</td>
    <td>$autorCambiado</td>
    <td>$anoCambiado</td>
    </tr>";

        $contador++;
    }
}

//Listado imprimir
function mostrarDatos($pinturas, &$contador)
{
    foreach ($pinturas as $cuadro => $info) {
        echo
        "<tr>
        <td>$cuadro</td>
        <td>$info[0]</td>
        <td>$info[1]</td>
        </tr>";

        $contador++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="get">
        <button name="listado_completo">Listado completo</button>
        <button name="ordenar_autor">Ordenado polo nome do autor</button>
        <button name="ordenar_titulo">Ordenar o listado polo nome do título</button>
        <button name="ordenar_ano_desc">Ordena as pinturas cronoloxicamente Desc</button>
        <button name="ordenar_ano_asc">Ordena as pinturas cronoloxicamente Asc</button>
        <button name="maiscula_primeira_letra_titulo">Pasa a maiúscula a primeira letra de cada palabra do título</button>
        <button name="eliminar_espacios_titulo">Elimina os espazos dos títulos</button>
        <button name="cambiarOporU">Cambia a letra ‘o’ pola letra ‘u’ de todos os datos</button>

        <label for="titulo">Título: </label>
        <input type="text" name="titulo">
        <label for="autor">Autor: </label>
        <input type="text" name="autor">
        <button name="btn_buscar_titulo">Enviar</button>
    </form>

    <table border="1px">
        <tr>
            <th>Cuadro</th>
            <th>Artista</th>
            <th>Año</th>
        </tr>
        <?php
        if (isset($_GET['listado_completo'])) {
            mostrarDatos($pinturas, $contador);
        }

        if (isset($_GET['ordenar_autor'])) {
            mostrarDatos(ordenarAutor($pinturas), $contador);
        }

        if (isset($_GET['ordenar_titulo'])) {
            mostrarDatos(ordenarTitulo($pinturas), $contador);
        }

        if (isset($_GET['ordenar_ano_desc'])) {
            mostrarDatos(ordenarAnoDesc($pinturas), $contador);
        }

        if (isset($_GET['ordenar_ano_asc'])) {
            mostrarDatos(ordenarAnoAsc($pinturas), $contador);
        }

        if (isset($_GET['maiscula_primeira_letra_titulo'])) {
            mostrarDatos(pasarMaiscula($pinturas), $contador);
        }

        if (isset($_GET['eliminar_espacios_titulo'])) {
            eliminarEspaciosTitulo($pinturas, $contador);
        }

        if (isset($_GET['cambiarOporU'])) {
            cambiarOporU($pinturas, $contador);
        }

        if (isset($_GET['btn_buscar_titulo'])) {
            $buscar_titulo = $_GET['titulo'] ?? '';
            $buscar_autor = $_GET['autor'] ?? '';

            foreach ($pinturas as $cuadro => $info) {
                if (str_contains($cuadro, $buscar_titulo) || str_contains($info[0], $buscar_titulo)) {
                    echo
                    "<tr>
                <td>$cuadro</td>
                <td>$info[0]</td>
                <td>$info[1]</td>
                </tr>";

                    $contador++;
                }
            }
        }
        ?>
    </table>

    <p>
        <?php
        echo "Mostrados $contador filas de un total de " . count($pinturas);
        ?>
    </p>
</body>

</html>