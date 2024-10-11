<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenar Distancias</title>

</head>

<body>
    <h1>Ordenar Distancias entre Cidades</h1>

    <?php

    $distancias = array(
        array("Orixe" => "Madrid", "Destino" => "Segovia", "Distancia" => 90201),
        array("Orixe" => "Madrid", "Destino" => "A Coruña", "Distancia" => 596887),
        array("Orixe" => "Barcelona", "Destino" => "Cádiz", "Distancia" => 1152669),
        array("Orixe" => "Bilbao", "Destino" => "Valencia", "Distancia" => 622233),
        array("Orixe" => "Sevilla", "Destino" => "Santander", "Distancia" => 832067),
        array("Orixe" => "Oviedo", "Destino" => "Badajoz", "Distancia" => 682429)
    );



    if (isset($_GET['orixe_asc'])) {
        usort($distancias, function ($a, $b) {
            return strcmp($a['Orixe'], $b['Orixe']);
        });
        echo "<p>Ordenado alfabéticamente polo nome da orixe (A-Z).</p>";
    }
    if (isset($_GET['orixe_desc'])) {
        usort($distancias, function ($a, $b) {
            return strcmp($b['Orixe'], $a['Orixe']);
        });
        echo "<p>Ordenado alfabéticamente polo nome da orixe (Z-A).</p>";
    }
    if (isset($_GET['destino_asc'])) {
        usort($distancias, function ($a, $b) {
            return strcmp($a['Destino'], $b['Destino']);
        });
        echo "<p>Ordenado alfabéticamente polo nome do destino (A-Z).</p>";
    }
    if (isset($_GET['destino_desc'])) {
        usort($distancias, function ($a, $b) {
            return strcmp($b['Destino'], $a['Destino']);
        });
        echo "<p>Ordenado alfabéticamente polo nome do destino (Z-A).</p>";
    }
    if (isset($_GET['distancia_asc'])) {
        usort($distancias, function ($a, $b) {
            return $a['Distancia'] - $b['Distancia'];
        });
        echo "<p>Ordenado pola distancia de menor a maior.</p>";
    }
    if (isset($_GET['distancia_desc'])) {
        usort($distancias, function ($a, $b) {
            return $b['Distancia'] - $a['Distancia'];
        });
        echo "<p>Ordenado pola distancia de maior a menor.</p>";
    }


    echo "<table border='1px'>";
    echo "<tr><th>Orixe</th><th>Destino</th><th>Distancia (en metros)</th></tr>";
    foreach ($distancias as $viaxe) {
        echo "<tr>";
        echo "<td>{$viaxe['Orixe']}</td>";
        echo "<td>{$viaxe['Destino']}</td>";
        echo "<td>{$viaxe['Distancia']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <h2>Ordenar:</h2>
    <form method="GET">
        <button type="submit" name="orixe_asc"" >Ordenar polo nome da orixe (A-Z)</button>
        <br>
        <br>
        <button type=" submit" name="orixe_desc">Ordenar polo nome da orixe (Z-A)</button>
        <br>
        <br>
        <button type="submit" name="destino_asc">Ordenar polo nome do destino (A-Z)</button>
        <br>
        <br>
        <button type="submit" name="destino_desc">Ordenar polo nome do destino (Z-A)</button>
        <br>
        <br>
        <button type="submit" name="distancia_asc">Ordenar pola distancia (de menor a maior)</button>
        <br>
        <br>
        <button type="submit" name="distancia_desc">Ordenar pola distancia (de maior a menor)</button>
    </form>

</body>

</html>