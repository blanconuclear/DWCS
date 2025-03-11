<?php

require_once '../vista/vistaTema.php';
require_once '../modelo/TemaModelo.php';

$arrayTemas = TemaModelo::mostrartodos();


if (isset($_POST['btnEliminar'])) {
    $idTitulo = $_POST['btnEliminar'];

    TemaModelo::borrarPorTitulo($idTitulo);
}

if (isset($_POST['btnActualizar'])) {
    formActualizar();
}

if (isset($_POST['btnActualizarFinal'])) {
    echo "estás aquí";
    $idTitulo = $_POST['btnActualizarFinal'];
    $tituloActualizado = $_POST['actualizarTitulo'];
    $autorActualizado = $_POST['actualizarAutor'];
    $anoActualizado = intval($_POST['actualizarAno']);
    $duracionActualizado = intval($_POST['actualizarDuracion']);
    $imaxeActualizado = $_POST['actualizarImaxe'];

    TemaModelo::actualizarPorTitulo($idTitulo, $tituloActualizado, $autorActualizado, $anoActualizado, $duracionActualizado, $imaxeActualizado);

    $arrayTemas = TemaModelo::mostrartodos();
}



mostrarDatosHtml($arrayTemas);
