<?php

require_once '../modelo/TemaModelo.php';
require_once '../vista/vistaTema.php';

//mostrar todos al principio
$arrayTemas = TemaModelo::mostrarTodos();

if (isset($_POST['btnActualizar'])) {
    formActualizar();
}

if (isset($_POST['btnActualizarFinal'])) {
    echo "jejej";
}

if (isset($_POST['btnEliminar'])) {
    $tituloEliminar = $_POST['btnEliminar'];

    TemaModelo::borrarPorTitulo($tituloEliminar);

    $arrayTemas = TemaModelo::mostrarTodos();
}

buscarPorTitulo();

if (isset($_POST['btnBuscarPorTitulo'])) {
    $tituloABuscar = $_POST['buscarTitulo'];

    if ($tituloABuscar != "") {
        TemaModelo::buscarPorTitulo($tituloABuscar);

        $arrayTemas = TemaModelo::buscarPorTitulo($tituloABuscar); // Ahora almacena los resultados
    }
}




mostrarDatosHTML($arrayTemas);
