<?php
$puntos = array("Ana" => 123, "Belén" => 14, "Felipe" => 3, "Moncho" => 245, "Artur" => 10);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ordenamento de arrays en PHP</h1>
    <table border="1px">
        <tr>
            <th>Nome Función</th>
            <th>Explicación do que fai</th>
            <th>Exemplo</th>
            <th>Mostra por pantalla</th>
        </tr>
        <tr>
            <th>asort()</th>
            <th>Ordenar un array en orde ascendente, modificando o array orixinal.</th>
            <th>asort($copia)</th>
            <th>
                <?php
                $copia = $puntos;
                asort($copia);
                echo '<pre>';
                print_r($copia);
                echo '</pre>';
                ?>
            </th>
        </tr>
        <tr>
            <th>sort()</th>
            <th>Ordenar os elementos dun array en orde ascendente.</th>
            <th>sort($copia)</th>
            <th>
                <?php
                $copia = $puntos;
                echo '<pre>';
                print_r($copia);
                echo '</pre>';
                ?>
            </th>
        </tr>
        <tr>
            <th>arsort()</th>
            <th>Ordenar un array asociativo en orde descendente, mantendo as chaves asociativas.</th>
            <th>arsort($copia)</th>
            <th>
                <?php
                $copia = $puntos;
                arsort($copia);
                echo '<pre>';
                print_r($copia);
                echo '</pre>';
                ?>
            </th>
        </tr>
        <tr>
            <th>ksort()</th>
            <th>Ordenar un array asociativo polas súas chaves en orde ascendente.</th>
            <th>ksort($copia)</th>
            <th>
                <?php
                $copia = $puntos;
                ksort($copia);
                echo '<pre>';
                print_r($copia);
                echo '</pre>';
                ?>
            </th>
        </tr>
        <tr>
            <th>krsort()</th>
            <th>Ordenar un array asociativo polas súas chaves en orde descendente.</th>
            <th>krsort($copia)</th>
            <th>
                <?php
                $copia = $puntos;
                krsort($copia);
                echo '<pre>';
                print_r($copia);
                echo '</pre>';
                ?>
            </th>
        </tr>
        <tr>
            <th>shuffle()</th>
            <th>Barallar aleatoriamente os elementos dun array.</th>
            <th>shuffle($copia)</th>
            <th>
                <?php
                $copia = $puntos;
                shuffle($copia);
                echo '<pre>';
                print_r($copia);
                echo '</pre>';
                ?>
            </th>
        </tr>
        <tr>
            <th>array_reverse()</th>
            <th>Inverter a orde dos elementos dun array.</th>
            <th>array_reverse($copia)</th>
            <th>
                <?php
                $copia = $puntos;
                $reversed = array_reverse($copia);
                echo '<pre>';
                print_r($reversed);
                echo '</pre>';
                ?>
            </th>
        </tr>
    </table>
</body>

</html>