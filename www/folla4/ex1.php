<?php
/*
Video en donde se explica los arrays multidimensionales
y como recorrerlos:
https://www.youtube.com/watch?v=WTbeB7Quzho
*/
$viaxes = array();

$viaxes[0] = array("Madrid", "Segovia", 90201);
$viaxes[1] = array("Madrid", "A Coruña", 596887);
$viaxes[2] = array("Barcelona", "Cádiz", 1152669);
$viaxes[3] = array("Bilbao", "Valencia", 622233);
$viaxes[4] = array("Sevilla", "Santander", 832067);
$viaxes[5] = array("Oviedo", "Badajoz", 682429);

// Bucle para calcular o viaxe máis longo.
$viaxeMaisLongoOrixe = "";
$viaxeMaisLongoDestino = "";
$viaxeMaisLongoDistancia = 0;

for ($i = 0; $i < count($viaxes); $i++) {
    if ($viaxes[$i][2] > $viaxeMaisLongoDistancia) {
        $viaxeMaisLongoOrixe = $viaxes[$i][0];
        $viaxeMaisLongoDestino = $viaxes[$i][1];
        $viaxeMaisLongoDistancia = $viaxes[$i][2];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaxe</title>
    <style>
        body {
            background-color: blue;
            color: white;
            text-align: center;
        }

        table {
            width: 50%;
            border-collapse: collapse;
            margin: 50px auto;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            text-align: center;
        }

        th {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>

<body>
    <h1 style="color: yellow;">Viaxe</h1>
    <table>
        <tr>
            <th>Orixe</th>
            <th>Destino</th>
            <th>Distancia (Km)</th>
        </tr>

        <?php
        // Recorremos el array y mostramos los datos en la tabla
        for ($fila = 0; $fila < count($viaxes); $fila++) {
            echo "<tr>"; // Comienza una nueva fila para cada viaje
            for ($columna = 0; $columna < count($viaxes[$fila]); $columna++) {
                // Imprimimos el dato correspondiente en la columna
                echo "<td>" . $viaxes[$fila][$columna] . "</td>";
            }
            echo "</tr>"; // Termina la fila después de imprimir todos los datos de un viaje
        }
        ?>
    </table>
    <h3><?= "O traxento máis longo é o de $viaxeMaisLongoOrixe a $viaxeMaisLongoDestino con $viaxeMaisLongoDistancia Kms" ?></h3>
</body>

</html>