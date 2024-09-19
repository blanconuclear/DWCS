<?php

if (strcmp($_GET['operacion'], 'suma') == 0) {
    echo "<p>O resultado é: </p>" . $_GET['numero1'] + $_GET['numero2'];
}

if (strcmp($_GET['operacion'], 'resta') == 0) {
    echo "<p>O resultado é: </p>" . $_GET['numero1'] - $_GET['numero2'];
}

if (strcmp($_GET['operacion'], 'multiplicacion') == 0) {
    echo "<p>O resultado é: </p>" . $_GET['numero1'] * $_GET['numero2'];
}
