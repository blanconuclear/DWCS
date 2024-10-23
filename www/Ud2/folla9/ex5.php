<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenar Array</title>
</head>

<body>
    <h1>Ordenar Puntos</h1>

    <?php

    $puntos = array("Ana" => 123, "Belén" => 14, "Felipe" => 3, "Moncho" => 245, "Artur" => 10);


    if (isset($_GET['ascendente'])) {
        // Ordenar puntos de menor a maior
        asort($puntos);
        echo "<h2>Ordenado por puntos de menor a maior:</h2>";
        foreach ($puntos as $nome => $punto) {
            echo "<p><strong>$nome:</strong> $punto puntos</p>";
        }
    }
    if (isset($_GET['descendente'])) {
        // Ordenar puntos de maior a menor
        arsort($puntos);
        echo "<h2>Ordenado por puntos de maior a menor:</h2>";
        foreach ($puntos as $nome => $punto) {
            echo "<p><strong>$nome:</strong> $punto puntos</p>";
        }
    }
    if (isset($_GET['alfabetico'])) {
        // Ordenar polo nome alfabéticamente
        ksort($puntos);
        echo "<h2>Ordenado alfabéticamente polo nome:</h2>";
        foreach ($puntos as $nome => $punto) {
            echo "<p><strong>$nome:</strong> $punto puntos</p>";
        }
    }
    if (isset($_GET['tamano_nome'])) {
        // Ordenar polo tamaño do nome
        uksort($puntos, function ($a, $b) {
            return strlen($a) - strlen($b);
        });
        echo "<h2>Ordenado polo tamaño do nome:</h2>";
        foreach ($puntos as $nome => $punto) {
            echo "<p><strong>$nome:</strong> $punto puntos</p>";
        }
    }

    ?>

    <form method="GET" action="">
        <button type="submit" name="ascendente" value="ascendente">Ordenar puntos de menor a maior</button>
        <button type="submit" name="descendente" value="descendente">Ordenar puntos de maior a menor</button>
        <button type="submit" name="alfabetico" value="alfabetico">Ordenar polo nome alfabéticamente</button>
        <button type="submit" name="tamano_nome" value="tamano_nome">Ordenar polo tamaño do nome</button>
    </form>

</body>

</html>