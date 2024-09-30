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

</body>

</html>

<?php
$cadea = $_GET['cadea'];
$funcionsCadea = $_GET['funcionsCadea'];

if ($funcionsCadea == 'stripcslashes') {
    echo "stripslasehes elimina as barras invertidas da cadea. <br>";
    echo "Cadea sen tratar: $cadea <br>";
    echo "Cadea tratada: " . stripslashes($cadea);
} elseif ($funcionsCadea == "urlencode") {
    echo "urlencode codifica unha cadea de texto para que poida ser enviada por unha URL. <br>";
    echo "Cadea sen tratar: $cadea <br>";
    echo "Cadea tratada: " . urlencode($cadea);
} elseif ($funcionsCadea == "urlcode") {
    echo "urldecode decodifica unha cadea de texto codificada por urlencode. <br>";
    echo "Cadea sen tratar: $cadea <br>";
    echo "Cadea tratada: " . urldecode($cadea);
} elseif ($funcionsCadea == "nl2br") {
    echo "nl2br convirte os saltos de liña en etiquetas <br> HTML. <br>";
    echo "Cadea sen tratar: $cadea <br>";
    echo "Cadea tratada: " . nl2br($cadea);
}
