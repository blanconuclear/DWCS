<?php
require_once '../modelo/TemaModelo.php';
require_once '../vista/vistaTema.php';

$arrayTemas = TemaModelo::mostrarTodos();

if (isset($_POST['btnBorrar'])) {
    $tituloParaBorrar = $_POST['btnBorrar'];

    TemaModelo::borrarPorTitulo($tituloParaBorrar);

    $arrayTemas = TemaModelo::mostrarTodos();
}

buscarPorTitulo();

if (isset($_POST['btnBuscarPorTitulo'])) {
    $tituloParaBuscar = $_POST['tituloParaBuscar'];

    $arrayTemas = TemaModelo::buscarPorTitulo($tituloParaBuscar);
}

if (isset($_POST['btnEditarFinal'])) {
    $tituloParaEditar = $_POST['btnEditarFinal'];
    $tituloActualizar = $_POST['tituloAeditar'];
    $autorActualizar = $_POST['autorAeditar'];
    $anoActualizar = $_POST['anoAeditar'];
    $duracionActualizar = $_POST['duracionAeditar'];
    $imaxeActualizar = $_POST['imaxeAeditar'];

    TemaModelo::actualizarPorTitulo(
        $tituloActualizar,
        $tituloParaEditar,
        $autorActualizar,
        $anoActualizar,
        $duracionActualizar,
        $imaxeActualizar
    );

    $arrayTemas = TemaModelo::mostrarTodos();
}

formInsertar();

if (isset($_POST['btnInsertar'])) {
    $titulo = $_POST["txtTitulo"];
    $autor = $_POST["txtAutor"];
    $ano = (int) $_POST["txtAno"];
    $duracion = (int) $_POST["txtDuracion"];
    $imaxen = "imaxe modificada";

    $temaNovo = new TemaModelo($titulo, $autor, $ano, $duracion, $imaxen);
    $temaNovo->guardar();

    $arrayTemas = TemaModelo::mostrarTodos();
}







mostrarDatosHTML($arrayTemas);
