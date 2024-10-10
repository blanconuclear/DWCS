<?php
$libros = [
    ["A sombra do vento", "Carlos Ruiz Zafón", "Planeta"],
    ["Don Quixote", "Miguel de Cervantes", "Anaya"],
    ["O nome da rosa", "Umberto Eco", "Lumen"],
    ["Memorias dun neno labrego", "Xosé Neira Vilas", "Galaxia"],
    ["Cien años de soledad", "Gabriel García Márquez", "Sudamericana"],
    ["El juego del ángel", "Carlos Ruiz Zafón", "Planeta"],
    ["A Divina Comedia", "Dante Alighieri", "Penguin Classics"]
];

// Función para ordenar os libros polo título
function ordenar_libros($libros)
{
    usort($libros, function ($a, $b) {
        return strcmp($a[0], $b[0]);
    });
    return $libros;
}


$numeroTotalExemplares = 0;

$texto = $_GET['buscarExemplar'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTECA</title>
    <style>
        body {
            background-color: green;
            color: white;
        }
    </style>
</head>

<body>

    <h1>BIBLIOTECA</h1>
    <p>Operacións cos exemplares</p>
    <form action="ex3.php" method="get">
        <label for="buscarExemplar">Buscar exemplar:</label>
        <input type="text" id="buscarExemplar" name="buscarExemplar">
        <button type="submit" name="buscar">Buscar</button>
        <button type="submit" name="listadoCompleto">Ver listado completo da biblioteca</button>
        <button type="submit" name="listadoOrdenado">Ver listado completo ordenado polo título</button>
    </form>

    <table border="1px">
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Editorial</th>
        </tr>
        <?php
        if (isset($_GET['listadoCompleto'])) {
            // Mostrar listado completo
            foreach ($libros as $libro) {
                echo "<tr>";
                echo "<td>{$libro[0]}</td>";
                echo "<td>{$libro[1]}</td>";
                echo "<td>{$libro[2]}</td>";
                echo "</tr>";

                $numeroTotalExemplares++;
            }
        }

        if (isset($_GET['listadoOrdenado'])) {
            // Mostrar listado ordenado polo título
            $libros_ordenados = ordenar_libros($libros);
            foreach ($libros_ordenados as $libro) {
                echo "<tr>";
                echo "<td>{$libro[0]}</td>";
                echo "<td>{$libro[1]}</td>";
                echo "<td>{$libro[2]}</td>";
                echo "</tr>";

                $numeroTotalExemplares++;
            }
        }

        if (isset($_GET['buscar'])) {

            foreach ($libros as $libro) {
                if (strcmp($libro[0], $texto) == 0) {
                    echo "<tr>";
                    echo "<td>{$libro[0]}</td>";
                    echo "<td>{$libro[1]}</td>";
                    echo "<td>{$libro[2]}</td>";
                    echo "</tr>";

                    $numeroTotalExemplares++;
                }
            }
        }
        ?>
    </table>

    <p>O número de exemplares atopados é: <?php echo $numeroTotalExemplares ?></p>
</body>

</html>