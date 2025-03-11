<?php
require_once '../modelo/ModeloTema.php';
require_once '../vista/vistaTema.php';

$arrayTemas = ModeloTema::mostrarTodos();

if (isset($_POST['btnEliminar'])) {
    $tituloParaEliminar = $_POST['btnEliminar'];

    ModeloTema::eliminarPorTitulo($tituloParaEliminar);

    $arrayTemas = ModeloTema::mostrarTodos();
}

forBuscarPortitulo();

if (isset($_POST['btnBuscarPortitulo'])) {
    $tituloParaBuscar = $_POST['tituloParaBuscar'];

    if ($tituloParaBuscar != "") {
        $arrayTemas = ModeloTema::mostrarPorTitulo($tituloParaBuscar);
    }
}

formInsertar();

if (isset($_POST['btnInsertar'])) {
    $titulo = $_POST["txtTitulo"];
    $autor = $_POST["txtAutor"];
    $ano = (int) $_POST["txtAno"];
    $duracion = (int) $_POST["txtDuracion"];
    $imaxen = "imaxe modificada";

    $novoTema = new ModeloTema($titulo, $autor, $ano, $duracion, $imaxen);
    $novoTema->gardarTema();

    $arrayTemas = ModeloTema::mostrartodos();
}

if (isset($_POST['btnActualizar'])) {
    $tituloParaEditar = $_POST['btnActualizar'];
    $tituloActualizado = $_POST['actualizarTitulo'];
    $autorActualizado = $_POST['actualizarAutor'];
    $anoActualizado = $_POST['actualizarAno'];
    $duracionActualizado = $_POST['actualizarDuracion'];
    $imaxeActualizado = $_POST['actualizarImaxe'];

    ModeloTema::editarPorTitulo($tituloParaEditar, $tituloActualizado, $autorActualizado, $anoActualizado, $duracionActualizado, $imaxeActualizado);

    $arrayTemas = ModeloTema::mostrartodos();
}


mostrarDatosHTML($arrayTemas);
