<?php

$arrayPilotos = [
    "hamilton" => [
        "Australia" => 2,
        "Baréin" => 3,
        "China" => 4,
        "Azerbaiyán" => 1,
        "España" => 1,
        "Mónaco" => 3,
        "Canadá" => 5,
    ],
    "vettel" => [
        "Australia" => 1,
        "Baréin" => 1,
        "China" => 8,
        "Azerbaiyán" => 4,
        "España" => 4,
        "Mónaco" => 2,
        "Canadá" => 1,
    ],
    "raikkonen" => [
        "Australia" => 3,
        "Baréin" => "Abandonou",
        "China" => 3,
        "Azerbaiyán" => 2,
        "España" => "Abandonou",
        "Mónaco" => 4,
        "Canadá" => 6,
    ],
    "verstappen" => [
        "Australia" => 6,
        "Baréin" => "Abandonou",
        "China" => 5,
        "Azerbaiyán" => "Abandonou",
        "España" => 3,
        "Mónaco" => 9,
        "Canadá" => 3,
    ],
    "bottas" => [
        "Australia" => 8,
        "Baréin" => 2,
        "China" => 2,
        "Azerbaiyán" => 14,
        "España" => 2,
        "Mónaco" => 5,
        "Canadá" => 2,
    ],
];

$arrayPuntos = [
    1 => 25, // Primeiro
    2 => 18, // Segundo
    3 => 15, // Terceiro
    4 => 5,  // Cuarto
    5 => 4,  // Quinto
    6 => 3,  // Sexto
    7 => 2,  // Séptimo
    8 => 1   // Octavo
];

$numeroTotalProbas = count($arrayPilotos[$_GET['piloto']]);
$numeroTotalPuntos = 0;

foreach ($arrayPilotos[$_GET['piloto']] as $posicion) {
    $numeroTotalPuntos += $arrayPuntos[$posicion];
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
    <h1>FÓRMULA 1</h1>
    <?= "A clasificación de " . $_GET['piloto'] . " é: " ?>

    <table>
        <tr>
            <th>Gran Premio</th>
            <th>Posición</th>
            <th>Puntos</th>
        </tr>

        <?php
        if (isset($_GET['piloto'])) {
            foreach ($arrayPilotos[$_GET['piloto']] as $premio => $posicion) {
                echo "<tr>";
                echo "<td>" . $premio . "</td>";
                echo "<td>" . $posicion . "</td>";
                if ($posicion == "Abandonou" || $posicion > 8) {
                    echo "<td>" . "0" . "</td>";
                } else {
                    echo "<td>" . $arrayPuntos[$posicion] . "</td>";
                }
                echo "</tr>";
            }
        }


        ?>

    </table>

    <?= "Logo de $numeroTotalProbas " . $_GET['piloto'] . " leva  $numeroTotalPuntos puntos" ?>

</body>

</html>