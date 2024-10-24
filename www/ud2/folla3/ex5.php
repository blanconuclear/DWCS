<?php
$escolarizacion = array(
    "Andalucía" => 593.6,
    "Aragón" => 600.3,
    "Asturias" => 582.9,
    "Baleares" => 489.7,
    "Canarias" => 573.2,
    "Cantabria" => 551.5,
    "Castilla e León" => 645.3,
    "Castilla la Mancha" => 555.8,
    "Cataluña" => 568.3,
    "Comunidade Valenciana" => 561.1,
    "Extremadura" => 584.3,
    "Galicia" => 600.1
);

$media = array_sum($escolarizacion) / count($escolarizacion) / 10;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <style>
        tr:nth-child(even) {
            background-color: black;
            color: white;
            color: yellow;
        }

        tr:nth-child(odd) {
            background-color: white;
            color: black;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Comunidade</th>
            <th>Escolarización por 1000 habitantes</th>
            <th>% Escolarización</th>
        </tr>

        <?php
        foreach ($escolarizacion as $comunidad => $escolarizacions) { // Cambiado $salario a $sueldo
            echo "<tr>";
            echo "<td>$comunidad</td>";
            echo "<td>$escolarizacions</td>";
            echo "<td>" . $escolarizacions / 10 . "</td>";
            echo "</tr>";
        }

        ?>

        <tr> <!-- Añadido para nueva fila -->
            <td style="background-color: blue">Media</td>
            <td><?php echo $media; ?></td>
        </tr>
    </table>
</body>

</html>