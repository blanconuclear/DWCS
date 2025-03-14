<?php
require_once '../modelo/TemaModelo.php';
require_once '../vista/temaVista.php';

$arraTemas = TemaModelo::mostrarDatos();

if (isset($_POST['btnBorrar'])) {
    $tituloParaBorrar = urldecode($_POST['btnBorrar']);

    TemaModelo::borrarPorTitulo($tituloParaBorrar);

    $arraTemas = TemaModelo::mostrarDatos();
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

    $arraTemas = TemaModelo::mostrarDatos();
}

mostrarDatosHTML($arraTemas);
