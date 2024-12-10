<?php
// $distancias = array(
//     array("Orixe" => "Madrid", "Destino" => "Segovia", "Distancia" => 90201),
//     array("Orixe" => "Madrid", "Destino" => "A Coruña", "Distancia" => 596887),
//     array("Orixe" => "Barcelona", "Destino" => "Cádiz", "Distancia" => 1152669),
//     array("Orixe" => "Bilbao", "Destino" => "Valencia", "Distancia" => 622233),
//     array("Orixe" => "Sevilla", "Destino" => "Santander", "Distancia" => 832067),
//     array("Orixe" => "Oviedo", "Destino" => "Badajoz", "Distancia" => 682429)
// );

$distancias = array(
    array(
        "viaxe" => array("Orixe" => "Madrid", "Destino" => "Segovia", "Distancia" => 90201)
    ),
    array(
        "viaxe" => array("Orixe" => "Madrid", "Destino" => "A Coruña", "Distancia" => 596887)
    ),
    array(
        "viaxe" => array("Orixe" => "Barcelona", "Destino" => "Cádiz", "Distancia" => 1152669)
    ),
    array(
        "viaxe" => array("Orixe" => "Bilbao", "Destino" => "Valencia", "Distancia" => 622233)
    ),
    array(
        "viaxe" => array("Orixe" => "Sevilla", "Destino" => "Santander", "Distancia" => 832067)
    ),
    array(
        "viaxe" => array("Orixe" => "Oviedo", "Destino" => "Badajoz", "Distancia" => 682429)
    )
);

foreach ($distancias as $viaxe) {
    // Acceder correctamente a los valores dentro del array
    echo "<br>";
    echo $viaxe['viaxe']['Orixe'];  // Acceder al valor de 'Orixe'
    echo "<br>";
    echo $viaxe['viaxe']['Destino'];  // Acceder al valor de 'Destino'
    echo "<br>";
    echo $viaxe['viaxe']['Distancia'];  // Acceder al valor de 'Distancia'
    echo "<br>";
}
