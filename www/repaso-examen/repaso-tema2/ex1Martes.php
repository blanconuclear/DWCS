<?php

include_once 'pinturas.php';



//Funciones

//Ordenado polo nome do autor
function ordenarAutor($pinturas)
{
    uasort($pinturas, fn($a, $b) => strcmp($a[0], $b[0]));
    return $pinturas;
}

//Ordenar o listado polo nome do título
function ordenarTitulo($pinturas)
{

    ksort($pinturas);

    // uksort($pinturas, fn($a, $b) => strcmp($a, $b));
    return $pinturas;
}

//Ordena as pinturas cronoloxicamente
function ordenarCronoloxicamenteDesc($pinturas)
{
    uasort($pinturas, fn($a, $b) => $b[1] - $a[1]);
    return $pinturas;
}

//Ordena as pinturas desde a máis moderna á máis antiga.
function ordenarCronoloxicamenteAsc($pinturas)
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
function eliminarEspaciosTitulo($pinturas)
{
    foreach ($pinturas as $cuadro => $info) {
        $pintura = str_replace(" ", "", $cuadro);
        $artista = $info[0];
        $ano = $info[1];

        echo "<tr>
        <td>$pintura</td>
        <td>$artista</td>
        <td>$ano</td>
        </tr>";
    }
}

//Cambia a letra ‘o’ pola letra ‘u’ de todos os datos
function cambiarOporU($pinturas)
{
    foreach ($pinturas as $cuadro => $info) {
        $pintura = str_replace("o", "u", $cuadro);
        $artista = str_replace("o", "u", $info[0]);
        $ano = str_replace("o", "u", $info[1]);

        echo "<tr>
        <td>$pintura</td>
        <td>$artista</td>
        <td>$ano</td>
        </tr>";
    }
}

//Imprimir datos
function mostrarDatos($pinturas)
{
    foreach ($pinturas as $cuadro => $info) {
        $pintura = $cuadro;
        $artista = $info[0];
        $ano = $info[1];

        echo "<tr>
        <td>$pintura</td>
        <td>$artista</td>
        <td>$ano</td>
        </tr>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            height: 100vh;
            background-color: aquamarine;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        form {
            margin: 0 200px;
            text-align: center;
        }

        form button {
            margin: 10px;
            background-color: bisque;
            padding: 10px;
            border-radius: 10px;
        }

        form button:hover {

            background-color: burlywood;
        }

        table {
            border: 1px solid black;
            background-color: whitesmoke;
            border-collapse: collapse;
            border-radius: 10px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        img {
            width: 400px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <img src="The_Nightwatch_by_Rembrandt.webp" alt="">
    <form method="get">
        <button name="listado_completo">Listado completo</button>
        <button name="ordenar_autor">Ordenado polo nome do autor</button>
        <button name="ordenar_titulo">Ordenar o listado polo nome do título</button>
        <button name="ordenar_ano_desc">Ordena as pinturas cronoloxicamente Desc</button>
        <button name="ordenar_ano_asc">Ordena as pinturas cronoloxicamente Asc</button>
        <button name="maiscula_primeira_letra_titulo">Pasa a maiúscula a primeira letra de cada palabra do título</button>
        <button name="eliminar_espacios_titulo">Elimina os espazos dos títulos</button>
        <button name="cambiarOporU">Cambia a letra ‘o’ pola letra ‘u’ de todos os datos</button>

        <br>
        <label for="titulo">Título: </label>
        <input type="text" name="titulo">
        <label for="autor">Autor: </label>
        <input type="text" name="autor">
        <button name="btn_buscar_titulo">Enviar</button>
    </form>

    <table>
        <tr>
            <th>Pintura</th>
            <th>Artista</th>
            <th>Año</th>
        </tr>
        <?php
        if (isset($_GET['listado_completo'])) {
            mostrarDatos($pinturas);
        }

        if (isset($_GET['ordenar_autor'])) {
            mostrarDatos(ordenarAutor($pinturas));
        }

        if (isset($_GET['ordenar_titulo'])) {
            mostrarDatos(ordenarTitulo($pinturas));
        }

        if (isset($_GET['ordenar_ano_desc'])) {
            mostrarDatos(ordenarCronoloxicamenteDesc($pinturas));
        }

        if (isset($_GET['ordenar_ano_asc'])) {
            mostrarDatos(ordenarCronoloxicamenteAsc($pinturas));
        }

        if (isset($_GET['maiscula_primeira_letra_titulo'])) {
            mostrarDatos(pasarMaiscula($pinturas));
        }

        if (isset($_GET['eliminar_espacios_titulo'])) {
            eliminarEspaciosTitulo($pinturas);
        }

        if (isset($_GET['cambiarOporU'])) {
            cambiarOporU($pinturas);
        }

        if (isset($_GET['btn_buscar_titulo'])) {
            $buscar_titulo = $_GET['titulo'] ?? '';
            $buscar_autor = $_GET['autor'] ?? '';

            foreach ($pinturas as $cuadro => $info) {
                if (str_contains($cuadro, $buscar_titulo) || str_contains($info[0], $buscar_autor)) {
                    $pintura = $cuadro;
                    $artista = $info[0];
                    $ano = $info[1];

                    echo "<tr>
                    <td>$pintura</td>
                    <td>$artista</td>
                    <td>$ano</td>
                    </tr>";
                }
            }
        }




        ?>
    </table>
</body>

</html>