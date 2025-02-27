<?php
spl_autoload_register(function ($nombre_clase) {

    $directorio = 'clases/';


    $archivo = $directorio . $nombre_clase . '.php';


    include $archivo;
});



$suma1 = new Suma();
$suma1->setOperando1(2);
$suma1->setOperando2(2);
$suma1->calcular();

echo $suma1->getResultado();


$resta1 = new Resta();
$resta1->setOperando1(2);
$resta1->setOperando2(2);
$resta1->calcular();

echo $resta1->getResultado();
