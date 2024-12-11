<?php
require_once 'pinturas.php';

$contador = 0;

//Funciones

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

//Ordena as pinturas cronoloxicamente
function ordenarCronoloxicamenteDesc($pinturas)
{
    uasort($pinturas, fn($a, $b) => $b[1] - $a[1]);
    return $pinturas;
}

// Pasa la primera letra de cada palabra del título a mayúscula
function pasarPrimeraLetraMayuscula($pinturas)
{
    echo "<table border='1px'>
    <tr>
        <th>Cuadro</th>
        <th>Autor</th>
        <th>Ano</th>
    </tr>";
    foreach ($pinturas as $cuadro => $info) {
        // Pasa la primera letra de cada palabra a mayúscula en el título
        $cuadro = ucwords($cuadro);
        $autor = $info[0];
        $ano = $info[1];

        echo "<tr>
                <td>$cuadro</td>
                <td>$autor</td>
                <td>$ano</td>
            </tr>";
    }
    echo "</table>";
}


//Elimina os espazos dos títulos
function eliminarEspaciosTitulo($pinturas, &$contador)
{
    echo "<table border='1px'>
    <tr>
        <th>Cuadro</th>
        <th>Autor</th>
        <th>Ano</th>
    </tr>";
    foreach ($pinturas as $cuadro => $info) {
        $autor = $info[0];
        $ano = $info[1];
        $cuadroSenEspacios = str_replace(" ", "", $cuadro);

        echo "<tr>
    <td>$cuadroSenEspacios</td>
    <td>$autor</td>
    <td>$ano</td>
    </tr>";

        $contador++;
    }

    echo "</table>";
}

//Cambia a letra ‘o’ pola letra ‘u’ de todos os datos
function cambiarOporU($pinturas)
{
    echo "<table border='1px'>
    <tr>
        <th>Cuadro</th>
        <th>Autor</th>
        <th>Ano</th>
    </tr>";
    foreach ($pinturas as $cuadro => $info) {
        $autorCambiado = str_replace("o", "u", $info[0]);
        $anoCambiado = str_replace("o", "u", $info[1]);
        $cuadroCambiado = str_replace("o", "u", $cuadro);

        echo "<tr>
    <td>$cuadroCambiado</td>
    <td>$autorCambiado</td>
    <td>$anoCambiado</td>
    </tr>";
    }

    echo "</table>";
}

//Busca unha palabra  no título
function buscarTitulo($pinturas, &$contador)
{
    $buscar_titulo = $_GET['buscar_palabra_titulo'] ?? '';

    echo "<table border='1px'>
    <tr>
        <th>Cuadro</th>
        <th>Autor</th>
        <th>Ano</th>
    </tr>";
    foreach ($pinturas as $cuadro => $info) {
        if (str_contains($cuadro, $buscar_titulo)) {
            $autor = $info[0];
            $ano = $info[1];

            echo "<tr>
            <td>$cuadro</td>
            <td>$autor</td>
            <td>$ano</td>
            </tr>";

            $contador++;
        }
    }
    echo "</table>";
}

//Busca unha palabra  no autor
function buscarAutor($pinturas, &$contador)
{
    $buscar_titulo = $_GET['buscar_palabra_autor'] ?? '';

    echo "<table border='1px'>
    <tr>
        <th>Cuadro</th>
        <th>Autor</th>
        <th>Ano</th>
    </tr>";
    foreach ($pinturas as $cuadro => $info) {
        if (str_contains($info[0], $buscar_titulo)) {
            $autor = $info[0];
            $ano = $info[1];

            echo "<tr>
            <td>$cuadro</td>
            <td>$autor</td>
            <td>$ano</td>
            </tr>";

            $contador++;
        }
    }
    echo "</table>";
}

//Mostrar todo
function imprimirDatos($pinturas, &$contador)
{

    echo "<table border='1px'>
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
    //Tabla

    //Listado completo
    if (isset($_GET['listado_completo'])) {
        imprimirDatos($pinturas, $contador);
    }

    //Ordenado polo nome do autor
    if (isset($_GET['ordenar_autor'])) {
        imprimirDatos(ordenarAutor($pinturas), $contador);
    }

    //Ordenar o listado polo nome do título
    if (isset($_GET['ordenar_titulo'])) {
        imprimirDatos(ordenarTitulo($pinturas), $contador);
    }

    //Ordena as pinturas cronoloxicamente asc
    if (isset($_GET['ordenar_asc'])) {
        imprimirDatos(ordenarCronoloxicamenteAsc($pinturas), $contador);
    }

    //Ordena as pinturas cronoloxicamente desc
    if (isset($_GET['ordenar_desc'])) {
        imprimirDatos(ordenarCronoloxicamenteDesc($pinturas), $contador);
    }

    //Pasa a maiúscula a primeira letra de cada palabra do título
    if (isset($_GET['maiuscula_primeira_letra_titulo'])) {
        pasarPrimeraLetraMayuscula($pinturas);
    }

    //Elimina os espazos dos títulos
    if (isset($_GET['eliminar_espacios_titulo'])) {
        eliminarEspaciosTitulo($pinturas, $contador);
    }

    //Cambia a letra ‘o’ pola letra ‘u’ de todos os datos
    if (isset($_GET['cambiar_o_por_u'])) {
        cambiarOporU($pinturas);
    }

    //Busca unha palabra  no título
    if (isset($_GET['btn_buscar_palabra_titulo'])) {
        buscarTitulo($pinturas, $contador);
    }

    //Busca unha palabra  no autor
    if (isset($_GET['btn_buscar_palabra_autor'])) {
        buscarAutor($pinturas, $contador);
    }


    ?>
    <p>

        <?php
        echo "Mostrados $contador filas de un total de " . count($pinturas)
        ?>
    </p>

</body>

</html>