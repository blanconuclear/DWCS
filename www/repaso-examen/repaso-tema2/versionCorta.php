<?php
require_once 'pinturas.php';

// FUNCIONES

// Ordenar polo nome do autor
function ordenarNomeAutor($pinturas)
{
    uasort($pinturas, fn($a, $b) => strcmp($a[0], $b[0]));
    return $pinturas;
}

// Ordenar o listado polo nome do título
function ordenarNomeTitulo($pinturas)
{
    uksort($pinturas, fn($a, $b) => strcmp($a, $b));
    return $pinturas;
}

// Ordena as pinturas cronoloxicamente Ascendente
function ordenarCronoloxicamente($pinturas)
{
    uasort($pinturas, fn($a, $b) => $a[1] - $b[1]);
    return $pinturas;
}

// Ordena as pinturas cronoloxicamente Descendente
function ordenarCronoloxicamenteDescendente($pinturas)
{
    uasort($pinturas, fn($a, $b) => $b[1] - $a[1]);
    return $pinturas;
}

// Pasa a maiúscula a primeira letra de cada palabra do título
function capitalizarTitulos($pinturas)
{
    $pinturasCapitalizadas = [];
    foreach ($pinturas as $titulo => $info) {
        $tituloCapitalizado = ucwords($titulo);
        $pinturasCapitalizadas[$tituloCapitalizado] = $info;
    }
    return $pinturasCapitalizadas;
}

// Pasa a maiúscula a terceira letra do título
function capitalizarTerceraLetraTitulos($pinturas)
{
    $pinturasCapitalizadas = [];
    foreach ($pinturas as $titulo => $info) {
        if (isset($titulo[2])) $titulo[2] = strtoupper($titulo[2]);
        $pinturasCapitalizadas[$titulo] = $info;
    }
    return $pinturasCapitalizadas;
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
        // Determina la acción seleccionada
        $accion = null;
        foreach ($_GET as $key => $value) {
            $accion = $key;
            break; // Solo toma la primera acción encontrada
        }

        // Acciones centralizadas
        switch ($accion) {
            case 'listado_completo':
                $pinturas_resultado = $pinturas;
                break;

            case 'ordenar_nome_autor':
                $pinturas_resultado = ordenarNomeAutor($pinturas);
                break;

            case 'ordenar_nome_pintura':
                $pinturas_resultado = ordenarNomeTitulo($pinturas);
                break;

            case 'ordenar_cronoloxicamente':
                $pinturas_resultado = ordenarCronoloxicamente($pinturas);
                break;

            case 'ordenar_cronoloxicamenteDescendente':
                $pinturas_resultado = ordenarCronoloxicamenteDescendente($pinturas);
                break;

            case 'pasar_maiusculas_primeira_letra':
                $pinturas_resultado = capitalizarTitulos($pinturas);
                break;

            case 'pasar_maiusculas_tercera_letra':
                $pinturas_resultado = capitalizarTerceraLetraTitulos($pinturas);
                break;

            case 'eliminar_espazos':
                $pinturas_resultado = [];
                foreach ($pinturas as $cuadro => $info) {
                    $pinturas_resultado[str_replace(" ", "", $cuadro)] = $info;
                }
                break;

            case 'cambiar_letra':
                $pinturas_resultado = [];
                foreach ($pinturas as $cuadro => $info) {
                    $pinturas_resultado[str_replace("o", "u", $cuadro)] = $info;
                }
                break;

            case 'buscar_palabra':
                $buscar_palabra_titulo = $_GET['buscar_palabra_titulo'] ?? '';
                $buscar_palabra_autor = $_GET['buscar_palabra_autor'] ?? '';
                $pinturas_resultado = [];
                foreach ($pinturas as $cuadro => $datos) {
                    if (
                        ($buscar_palabra_titulo && (str_contains($cuadro, $buscar_palabra_titulo) || str_contains($datos[0], $buscar_palabra_titulo))) ||
                        ($buscar_palabra_autor && str_contains($datos[0], $buscar_palabra_autor))
                    ) {
                        $pinturas_resultado[$cuadro] = $datos;
                    }
                }
                break;

            default:
                $pinturas_resultado = $pinturas;
                break;
        }

        // Mostrar resultados
        foreach ($pinturas_resultado as $cuadro => $info) {
            echo "<tr>";
            echo "<td>" . $cuadro . "</td>";
            echo "<td>" . $info[0] . "</td>";
            echo "<td>" . $info[1] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>