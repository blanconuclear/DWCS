<?php
function maiorAmenorClaves($a, $b)
{
    return strcmp($b, $a);
}

$datos = array('f' => 4, 'g' => 8, 'a' => -1, 'b' => -10);


uksort($datos, 'maiorAmenorClaves');



foreach ($datos as $key => $value) {
    echo "{$key} => {$value}<br>";
}
