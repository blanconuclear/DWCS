<?php
if (isset($_GET['numero1']) && isset($_GET['numero2']) && isset($_GET['numero3'])) {

    $numero1 = $_GET['numero1'];
    $numero2 = $_GET['numero2'];
    $numero3 = $_GET['numero3'];

    // Comprobación que os valores son numéricos
    if (is_numeric($numero1) && is_numeric($numero2) && is_numeric($numero3)) {

        $maior = max($numero1, $numero2, $numero3);
        $menor = min($numero1, $numero2, $numero3);

        echo "O maior número é: " . $maior . "<br>";
        echo "O menor número é: " . $menor;
    } else {
        echo "Por favor, introduce valores numéricos válidos.";
    }
} else {
    echo "Faltan valores no formulario.";
}
