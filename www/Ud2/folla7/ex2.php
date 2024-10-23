<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: sans-serif;
            font-size: 20px;
        }
    </style>
</head>

<body>

    <?php
    // Verifica si se ha enviado el formulario

    $cadea = $_GET['cadea'];
    $funcionsCadea = $_GET['funcionsCadea'];

    if ($funcionsCadea == 'stripcslashes') {
        echo "stripslashes elimina as barras invertidas da cadea. <br>" . "<br>";
        echo "Cadea sen tratar: " . htmlspecialchars($cadea) . "<br>" . "<br>";
        echo "Cadea tratada: " . htmlspecialchars(stripslashes($cadea));
    } elseif ($funcionsCadea == "urlencode") {
        echo "urlencode codifica unha cadea de texto para que poida ser enviada por unha URL. <br>" . "<br>";
        echo "Cadea sen tratar: " . htmlspecialchars($cadea) . "<br>" . "<br>";
        echo "Cadea tratada: " . htmlspecialchars(urlencode($cadea));
    } elseif ($funcionsCadea == "urlcode") {
        echo "urldecode decodifica unha cadea de texto codificada por urlencode. <br>" . "<br>";
        echo "Cadea sen tratar: " . htmlspecialchars($cadea) . "<br>" . "<br>";
        echo "Cadea tratada: " . htmlspecialchars(urldecode($cadea));
    } elseif ($funcionsCadea == "nl2br") {
        echo "nl2br converte os saltos de liña en etiquetas <br> HTML. <br>" . "<br>";
        echo "Cadea sen tratar: " . htmlspecialchars($cadea) . "<br>" . "<br>";
        echo "Cadea tratada: " . nl2br(htmlspecialchars($cadea));
    } else {
        echo "Por favor, introduce unha cadea de texto e escolle unha opción.";
    }
    ?>

</body>

</html>