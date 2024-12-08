<?php
require_once 'pinturas.php';

//FUNCIONES

//Ordenar polo nome do autor
//uasort: Cuando necesitas ordenar un array asociativo por sus valores.
function ordenarNomeAutor($pinturas)
{
    uasort($pinturas, fn($a, $b) => strcmp($a[0], $b[0]));
    return $pinturas; // Devuelve el array ordenado y con claves preservadas
}

//Ordenar o listado polo nome do título
//uksort: Cuando necesitas ordenar un array asociativo por sus claves.
function ordenarNomeTitulo($pinturas)
{
    uksort($pinturas, fn($a, $b) => strcmp($a, $b));
    return $pinturas;
}

//Ordena as pinturas cronoloxicamente Ascendente
function ordenarCronoloxicamente($pinturas)
{
    uasort($pinturas, fn($a, $b) => $a[1] - $b[1]);
    return $pinturas;
}

//Ordena as pinturas cronoloxicamente Descendente
function ordenarCronoloxicamenteDescendente($pinturas)
{
    uasort($pinturas, fn($a, $b) => $b[1] - $a[1]);
    return $pinturas;
}

//Pasa a maiúscula a primeira letra de cada palabra do título
function capitalizarTitulos($pinturas)
{
    $pinturasCapitalizadas = [];
    foreach ($pinturas as $titulo => $info) {
        $tituloCapitalizado = ucwords($titulo); // Convierte la primera letra de cada palabra a mayúscula
        $pinturasCapitalizadas[$tituloCapitalizado] = $info;
    }
    return $pinturasCapitalizadas; // Devuelve el nuevo array con los títulos capitalizados
}

//Pasa a maiúscula a terceira letra do título
function capitalizarTerceraLetraTitulos($pinturas)
{
    $pinturasCapitalizadas = [];

    foreach ($pinturas as $titulo => $info) {
        $titulo[2] = strtoupper($titulo[2]);
        $pinturasCapitalizadas[$titulo] = $info;
    }
    return $pinturasCapitalizadas;
}

function mostrarDatos($pinturas)
{
    foreach ($pinturas as $cuadro => $info) {
        echo "<tr>";
        echo "<td>" . $cuadro . "</td>";
        echo "<td>" . $info[0] . "</td>";
        echo "<td>" . $info[1] . "</td>";
        echo "</tr>";
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
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            text-align: center;
        }

        img {
            max-width: 30%;
            height: auto;
            margin: 20px 0;
            border-radius: 10px;
        }

        form {
            margin: 20px 0;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        input {
            padding: 5px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <img src="The_Nightwatch_by_Rembrandt.webp" alt="">

    <form action="" method="get">
        <!-- Cada botón representa una acción distinta -->
        <button name="listado_completo">Listado Completo</button>
        <button name="ordenar_nome_autor">Ordenar por Nome do Autor</button>
        <button name="ordenar_nome_pintura">Ordenar por Nome da Pintura</button>
        <button name="ordenar_cronoloxicamente">Ordenar Cronoloxicamente Ascendente</button>
        <button name="ordenar_cronoloxicamenteDescendente">Ordenar Cronoloxicamente Descendente</button>
        <button name="pasar_maiusculas_primeira_letra">Pasar a Maiúsculas Primeira letra título</button>
        <button name="pasar_maiusculas_tercera_letra">Pasar a Maiúsculas tercera letra título</button>
        <button name="eliminar_espazos">Eliminar Espazos</button>
        <button name="cambiar_letra">Cambiar Letra</button>

        <!-- Campos de texto para buscar palabras en el título o autor -->
        <label for="buscar_palabra_titulo">Buscar palabra no título:</label>
        <input type="text" name="buscar_palabra_titulo">
        <label for="buscar_palabra_autor">Buscar palabra no autor:</label>
        <input type="text" name="buscar_palabra_autor">
        <button name="buscar_palabra">Buscar</button>
    </form>

    <table border="1px">
        <tr>
            <th>Cuadro</th>
            <th>Pintor</th>
            <th>Año</th>
        </tr>

        <?php
        //Mostrar listado completo
        if (isset($_GET['listado_completo'])) {
            mostrarDatos($pinturas);
        }

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

        if (isset($_GET['ordenar_nome_pintura'])) {
            $pinturas_ordenadas = ordenarNomeTitulo($pinturas);

            foreach ($pinturas_ordenadas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . $cuadro . "</td>";
                echo "<td>" . $info[0] . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

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

        if (isset($_GET['ordenar_cronoloxicamenteDescendente'])) {
            $pinturas_ordenadas = ordenarCronoloxicamenteDescendente($pinturas);

            foreach ($pinturas_ordenadas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . $cuadro . "</td>";
                echo "<td>" . $info[0] . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        if (isset($_GET['pasar_maiusculas_primeira_letra'])) {
            $pinturas_ordenadas = capitalizarTitulos($pinturas);

            foreach ($pinturas_ordenadas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . $cuadro . "</td>";
                echo "<td>" . $info[0] . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        if (isset($_GET['pasar_maiusculas_tercera_letra'])) {
            $pinturas_ordenadas = capitalizarTerceraLetraTitulos($pinturas);

            foreach ($pinturas_ordenadas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . $cuadro . "</td>";
                echo "<td>" . $info[0] . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        //Elimina os espazos dos títulos
        if (isset($_GET['eliminar_espazos'])) {

            foreach ($pinturas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . str_replace(" ", "", $cuadro) . "</td>";
                echo "<td>" . $info[0] . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "</tr>";
            }
        }

        //Cambia a letra ‘o’ pola letra ‘u’ de todos os datos
        if (isset($_GET['cambiar_letra'])) {

            foreach ($pinturas as $cuadro => $info) {
                echo "<tr>";
                echo "<td>" . str_replace("o", "u", $cuadro) . "</td>";
                echo "<td>" . str_replace("o", "u", $info[0]) . "</td>";
                echo "<td>" . str_replace("o", "u", $info[1]) . "</td>";
                echo "</tr>";
            }
        }

        //Buscar
        //Sigue sin funcionar para el autor
        if (isset($_GET['buscar_palabra'])) {
            $buscar_palabra_titulo = $_GET['buscar_palabra_titulo'] ?? '';
            $buscar_palabra_autor = $_GET['buscar_palabra_autor'] ?? '';

            foreach ($pinturas as $cuadro => $datos) {
                // Comprobar si hay coincidencia en título o autor
                if (
                    ($buscar_palabra_titulo && (str_contains($cuadro, $buscar_palabra_titulo) || str_contains($datos[0], $buscar_palabra_titulo))) ||
                    ($buscar_palabra_autor && (str_contains($cuadro, $buscar_palabra_autor) || str_contains($datos[1], $buscar_palabra_autor)))
                ) {
                    echo "<tr>";
                    echo "<td>$cuadro</td>";
                    echo "<td>{$datos[0]}</td>";
                    echo "<td>{$datos[1]}</td>";
                    echo "</tr>";
                }
            }
        }








        ?>
    </table>
</body>

</html>