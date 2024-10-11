<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #d1dbeb;
            color: #435570;
            height: 100vh;
        }

        img {
            width: 100%;
        }
    </style>
</head>

<body>
    <img src="cabeceiraFolla2.10.jpg" alt="">
    <form action="ex1.php" method="get">

        <label for="frase">Introduce a Frase</label>
        <br>
        <input type="text" name="frase" id="frase">
        <br>

        <button name="pasaMaiuscula">Pasa a maiúsculas a primeira letra</button>
        <br>
        <button name="pasaMinuscula">Pasa a minúscula a primeira letra</button>
        <br>
        <button name="eliminaEspazo">Eliminar os espazos</button>
        <br>
        <button name="eliminaLetraE">Eliminar as letras 'e'</button>
        <br>
        <button name="puntosPorComas">Cambia os puntos por comas </button>
        <br>
        <br>
        <br>
        <label for="palabra">Introduce Palabra</label>
        <br>
        <input type="text" name="palabra" id="palabra">
        <br>

        <button name="comprobarPalabraFrase">A palabra está na frase?</button>
        <br>
        <button name="eliminarPalabra">Elimina a palabra</button>
        <br>
        <button name="cambiaPalabra">Cambia 'tardes' por 'noites'</button>
        <br>

    </form>
    <h3>Resultado:</h3>
    <br>

    <?php

    $frase = $_GET['frase'];
    $palabra = $_GET['palabra'];

    if (isset($_GET['pasaMaiuscula'])) {
        $fraseMaiuscula = ucfirst($frase);
        echo $fraseMaiuscula;
    }

    if (isset($_GET['pasaMinuscula'])) {
        $fraseMinuscula = lcfirst($frase);
        echo $fraseMinuscula;
    }

    if (isset($_GET['eliminaEspazo'])) {
        $reemplazaFrase = str_replace(" ", ",", $frase);
        echo $reemplazaFrase;
    }

    if (isset($_GET['eliminaLetraE'])) {

        $reemplazarLetraE = str_replace("e", "", $frase);
        echo $reemplazarLetraE;
    }

    if (isset($_GET['puntosPorComas'])) {
        $reemplazarPuntos = str_replace(".", ",", $frase);
        echo $reemplazarPuntos;
    }

    if (isset($_GET['comprobarPalabraFrase'])) {
        if (str_contains($frase, $palabra)) {
            echo "Na frase: " . $frase . ". Contén a palabra: " . $palabra;
        } else {
            echo "Na frase: " . $frase . ". Non c   ontén a palabra: " . $palabra;
        }
    }

    if (isset($_GET['eliminarPalabra'])) {
        $eliminarPalabra = str_replace($palabra, "", $frase);
        echo $eliminarPalabra;
    }


    if (isset($_GET['cambiaPalabra'])) {
        if (str_contains($frase, "tardes")) {
            $cambiaPalabra = str_replace("tardes", "noites", $frase);
            echo $cambiaPalabra;
        } else {
            echo "No se encontró la palabra 'tardes' en la frase.";
        }
    }
    ?>
</body>

</html>