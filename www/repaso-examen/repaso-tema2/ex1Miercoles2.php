<?php
require_once 'pinturas.php';

$contador = 0;

//Listado completo
function imprimirDatos($pinturas, &$contador)
{
    echo " <table border='1px'>
    <tr>
        <th>Cuadro</th>
        <th>Autor</th>
        <th>Ano</th>
    </tr>";


    foreach ($pinturas as $cuadro => $info) {
        $autor = $info[0];
        $ano = $info[1];

        echo "<tr>
            <td>$cuadro</td>
            <td>$autor</td>
            <td>$ano</td>
            </tr>";

        $contador++;
    }
    echo "</table>";
}

//Ordenado polo nome do autor
function ordenarAutor($pinturas)
{
    uasort($pinturas, fn($a, $b) => strcasecmp($a[0], $b[0]));
    return $pinturas;
}

//Ordenar o listado polo nome do título
function ordenarTitulo($pinturas)
{
    uksort($pinturas, fn($a, $b) => strcasecmp($a, $b));
    return $pinturas;
}

//Ordena as pinturas cronoloxicamente
function ordenarCronoloxicamenteAsc($pinturas)
{
    uasort($pinturas, fn($a, $b) => $a[1] - $b[1]);
    return $pinturas;
}

//Pasa a maiúscula a primeira letra de cada palabra do título
function maisculasPrimeiraLetraTitulo($pinturas)
{
    echo " <table border='1px'>
    <tr>
        <th>Cuadro</th>
        <th>Autor</th>
        <th>Ano</th>
    </tr>";


    foreach ($pinturas as $cuadro => $info) {
        $autor = $info[0];
        $ano = $info[1];
        $cuadro = ucwords($cuadro);
        echo "<tr>
            <td>$cuadro</td>
            <td>$autor</td>
            <td>$ano</td>
            </tr>";
    }
    echo "</table>";
}

//Buscar titulo
function buscarTitulo($pinturas)
{
    $buscar_titulo = $_GET['buscar_palabra_titulo'];

    echo " <table border='1px'>
    <tr>
        <th>Cuadro</th>
        <th>Autor</th>
        <th>Ano</th>
    </tr>";


    foreach ($pinturas as $cuadro => $info) {
        $autor = $info[0];
        $ano = $info[1];
        $cuadro = ucwords($cuadro);
        if (str_contains($cuadro, $buscar_titulo)) {
            # code...
            echo "<tr>
            <td>$cuadro</td>
            <td>$autor</td>
            <td>$ano</td>
            </tr>";
        }
    }
    echo "</table>";
}

//Buscar autor
function buscarAutor($pinturas)
{
    $buscar_autor = $_GET['buscar_palabra_autor'];

    echo " <table border='1px'>
    <tr>
        <th>Cuadro</th>
        <th>Autor</th>
        <th>Ano</th>
    </tr>";


    foreach ($pinturas as $cuadro => $info) {
        $autor = $info[0];
        $ano = $info[1];
        $cuadro = ucwords($cuadro);
        if (str_contains($autor, $buscar_autor)) {
            # code...
            echo "<tr>
            <td>$cuadro</td>
            <td>$autor</td>
            <td>$ano</td>
            </tr>";
        }
    }
    echo "</table>";
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
        <button name="ordenar_asc">Ordena as pinturas cronoloxicamente</button>
        <button name="ordenar_desc">Ordena as pinturas desde a máis moderna á máis antiga.</button>
        <button name="maiuscula_primeira_letra_titulo">Pasa a maiúscula a primeira letra de cada palabra do título</button>
        <button name="maiuscula_terceira_letra_titulo">Pasa a maiúscula a terceira letra do título</button>
        <button name="eliminar_espacios_titulo">Elimina os espazos dos títulos</button>
        <button name="cambiar_o_por_u">Cambia a letra ‘o’ pola letra ‘u’ de todos os datos</button>


        <label for="buscar_palabra_titulo"></label>
        <input type="text" name="buscar_palabra_titulo">
        <button name="btn_buscar_palabra_titulo">Buscar titulo</button>

        <label for="buscar_palabra_autor"></label>
        <input type="text" name="buscar_palabra_autor">
        <button name="btn_buscar_palabra_autor">Buscar autor</button>
    </form>

    <?php
    if (isset($_GET['listado_completo'])) {
        imprimirDatos($pinturas, $contador);
    }

    if (isset($_GET['ordenar_autor'])) {
        imprimirDatos(ordenarAutor($pinturas), $contador);
    }

    if (isset($_GET['ordenar_titulo'])) {
        imprimirDatos(ordenarTitulo($pinturas), $contador);
    }

    if (isset($_GET['ordenar_asc'])) {
        imprimirDatos(ordenarCronoloxicamenteAsc($pinturas), $contador);
    }

    if (isset($_GET['maiuscula_primeira_letra_titulo'])) {
        maisculasPrimeiraLetraTitulo($pinturas);
    }

    if (isset($_GET['btn_buscar_palabra_titulo'])) {
        buscarTitulo($pinturas);
    }

    if (isset($_GET['btn_buscar_palabra_autor'])) {
        buscarAutor($pinturas);
    }

    echo "Mostrados $contador filas de un total de " . count($pinturas);

    ?>

</body>

</html>