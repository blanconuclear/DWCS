<?php
require_once '../modelo/TemaModelo.php';
require_once '../vista/temaVista.php';

$arrayTemas = TemaModelo::mostrarDatos();

if (isset($_POST['btnBorrar'])) {
    $tituloParaBorrar = $_POST['btnBorrar'];

    TemaModelo::borrarPorTitulo($tituloParaBorrar);

    $arrayTemas = TemaModelo::mostrarDatos();
}

buscarPortitulo();

if (isset($_POST['btnBuscarPorTitulo'])) {
    $tituloParaBuscar = $_POST['buscarPorTitulo'];

    $arrayTemas = TemaModelo::buscarPorTitulo($tituloParaBuscar);
}


crearTitulo();

if (isset($_POST['btnCrear'])) {
    $crearTitulo = $_POST['crearTitulo'];
    $crearAutor = $_POST['crearAutor'];
    $crearAno = $_POST['crearAno'];
    $crearDuracion = $_POST['crearDuracion'];
    $crearImaxe = $_POST['crearImaxe'];

    $novoTema = new TemaModelo($crearTitulo, $crearAutor, $crearAno, $crearDuracion, $crearImaxe);
    $novoTema->guardarTema();

    $arrayTemas = TemaModelo::mostrarDatos();
}


if (isset($_POST['btnEditar'])) {
    $tituloParaEditar = urldecode($_POST['btnEditar']);
    $editarTitulo = $_POST['editarTitulo'];
    $editarAutor = $_POST['editarAutor'];
    $editarAno = $_POST['editarAno'];
    $editarDuracion = $_POST['editarDuracion'];
    $editarImaxe = $_POST['editarImaxe'];

    echo $tituloParaEditar;

    TemaModelo::editarPortitulo($tituloParaEditar, $editarTitulo, $editarAutor, $editarAno, $editarDuracion, $editarImaxe);

    $arrayTemas = TemaModelo::mostrarDatos();
}








mostrarDatosHTML($arrayTemas);
