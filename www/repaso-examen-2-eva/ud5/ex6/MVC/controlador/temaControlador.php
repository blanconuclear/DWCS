<?php
require_once '../modelo/TemaModelo.php';
require_once '../vista/temaVista.php';


$arrayTemas = TemaModelo::mostrarTodos();

if (isset($_POST['btnBorrar'])) {
    $tituloParaBorrar = urldecode($_POST['btnBorrar']);

    TemaModelo::borrarPorTitulo($tituloParaBorrar);

    $arrayTemas = TemaModelo::mostrarTodos();
}

formBuscarPorTitulo();


if (isset($_POST['btnBuscarPorTitulo'])) {
    $tituloParaBuscar = $_POST['buscarPorTitulo'];

    $arrayTemas = TemaModelo::buscarPortitulo($tituloParaBuscar);
}

formCrearTema();



if (isset($_POST['btnCrearTema'])) {
    $crearTitulo = $_POST['crearTitulo'];
    $crearAutor = $_POST['crearAutor'];
    $crearAno = $_POST['crearAno'];
    $crearDuracion = $_POST['crearDuracion'];
    $crearImaxe = $_POST['crearImaxe'];

    $novoTema = new TemaModelo($crearTitulo, $crearAutor, $crearAno, $crearDuracion, $crearImaxe);
    $novoTema->guardarTema();

    $arrayTemas = TemaModelo::mostrarTodos();
}


if (isset($_POST['btnEditar'])) {
    $tituloParaEditar = urldecode($_POST['btnEditar']);
    echo $tituloParaEditar;
    $editarTitulo = $_POST['editarTitulo'];
    $editarAutor = $_POST['editarAutor'];
    $editarAno = $_POST['editarAno'];
    $editarDuracion = $_POST['editarDuracion'];
    $editarImaxe = $_POST['editarImaxe'];

    TemaModelo::editarPortitulo($tituloParaEditar, $editarTitulo, $editarAutor, $editarAno, $editarDuracion, $editarImaxe);

    $arrayTemas = TemaModelo::mostrarTodos();
}







mostrarDatosHTML($arrayTemas);
