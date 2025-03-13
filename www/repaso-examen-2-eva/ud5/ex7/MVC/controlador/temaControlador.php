<?php
require_once '../modelo/TemaModelo.php';
require_once '../vista/temaVista.php';

$arrayTemas = TemaModelo::mostrarDatos();

if (isset($_POST['btnBorrar'])) {
    $tituloParaBorrar = urldecode($_POST['btnBorrar']);

    TemaModelo::borrarPorTitulo($tituloParaBorrar);

    $arrayTemas = TemaModelo::mostrarDatos();
}

buscarPortitulo();

if (isset($_POST['btnBuscarPorTitulo'])) {
    $tituloParaBuscar = $_POST['buscarPorTitulo'];

    $arrayTemas =  TemaModelo::buscarPorTitulo($tituloParaBuscar);
}

crearTitulo();

if (isset($_POST['btnCrear'])) {
    $crearTitulo = $_POST['crearTitulo'];
    $crearAutor = $_POST['crearAutor'];
    $crearAno = $_POST['crearAno'];
    $crearDuracion = $_POST['crearDuracion'];
    $crearImaxe = $_POST['crearImaxe'];

    $novoTema = new TemaModelo($crearTitulo, $crearAutor, $crearAno, $crearDuracion, $crearImaxe);
    $novoTema->guardar();

    $arrayTemas = TemaModelo::mostrarDatos();
}



mostrarDatosHTML($arrayTemas);
