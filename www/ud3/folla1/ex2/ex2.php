    <?php
    $conexion = mysqli_connect("dbXdebug", "root", "root", "folla1");

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <form method="get" action="">
            <button type="submit" name="order" value="orixe_asc">Orixe A-Z</button>
            <button type="submit" name="order" value="orixe_desc">Orixe Z-A</button>
            <button type="submit" name="order" value="destino_asc">Destino A-Z</button>
            <button type="submit" name="order" value="destino_desc">Destino Z-A</button>
            <button type="submit" name="order" value="distancia_asc">Distancia de menor a maior</button>
            <button type="submit" name="order" value="distancia_desc">Distancia de maior a menor</button>
        </form>

        <?php
        if (isset($_GET['order'])) {

            $order = $_GET['order'];

            switch ($order) {
                case 'orixe_asc':
                    $query = "SELECT * FROM traxectos ORDER BY orixe ASC";
                    break;

                case 'orixe_desc':
                    $query = "SELECT * FROM traxectos ORDER BY orixe DESC";
                    break;

                case 'destino_asc':
                    $query = "SELECT * FROM traxectos ORDER BY destino ASC";
                    break;

                case 'destino_desc':
                    $query = "SELECT * FROM traxectos ORDER BY destino DESC";
                    break;

                case 'distancia_asc':
                    $query = "SELECT * FROM traxectos ORDER BY distancia ASC";
                    break;

                case 'distancia_desc':
                    $query = "SELECT * FROM traxectos ORDER BY distancia DESC";
                    break;
            }
        }
        if ($conexion) {
            $resultado = mysqli_query($conexion, $query);
        }
        ?>
        <table border="1px">
            <tr>
                <th>Orixe</th>
                <th>Destino</th>
                <th>Distancia(en metros)</th>
            </tr>

            <?php
            while ($fila = mysqli_fetch_array($resultado)) {

                echo "<tr>
            <td>{$fila["orixe"]}</td>
            <td>{$fila["destino"]}</td>
            <td>{$fila["distancia"]}</td>
            </tr>";
            }
            ?>
        </table>
    </body>

    </html>