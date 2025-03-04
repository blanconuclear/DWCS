<?php

declare(strict_types=1);

require_once '../modelo/TemaModelo.php';
require_once '../vista/vistaTema.php';

$arrayTemas = TemaModelo::mostrarTodos();


buscarPorTitulo();
if (isset($_GET['btnBuscarPorTitulo'])) {
    $tituloParaBuscar =  $_GET['tituloParaBuscar'];

    $tema = new TemaModelo($tituloParaBuscar, "", 0, 0, "");
    $arrayTemas = $tema->buscarPorTitulo($tituloParaBuscar);
}

if (isset($_GET['btnBorrar'])) {
    $tituloAEliminar = $_GET['btnBorrar'];
    $tema = new TemaModelo($tituloAEliminar, "", 0, 0, "");
    $tema->eliminar();
}

formInsertarTema();
if (isset($_POST['btnInsertar'])) {
    $titulo = $_POST["txtActualizarTitulo"];
    $autor = $_POST["txtActualizarAutor"];
    $ano = (int) $_POST["txtActualizarAno"];
    $duracion = (int) $_POST["txtActualizarDuracion"];
    $imaxe = $_POST["txtActualizarImaxe"];
}


mostrarDatosHTML($arrayTemas);
