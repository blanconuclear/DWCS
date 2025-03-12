<?php
require_once '../modelo/TemaModelo.php';
require_once '../vista/vistaTema.php';


$arrayTemas = TemaModelo::mostrarTodos();

if (isset($_POST['btnBorrar'])) {
    $tituloParaBorrar = $_POST['btnBorrar'];

    TemaModelo::borrarPorTitutlo($tituloParaBorrar);

    $arrayTemas = TemaModelo::mostrarTodos();
}

buscarPorTitulo();

if (isset($_POST['btnBuscarPorTitulo'])) {
    $tituloParaBuscar = $_POST['buscarPorTitulo'];

    $arrayTemas = TemaModelo::buscarPorTitulo($tituloParaBuscar);
}


if (isset($_POST['btnEditarFinal'])) {
    echo "hola";
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
    $tituloCrear = $_POST['txtTitulo'];
    $autorCrear = $_POST['txtAutor'];
    $anoCrear = $_POST['txtAno'];
    $duracionCrear = $_POST['txtDuracion'];
    $imaxeCrear = "imaxe de proba";

    $novoTema = new TemaModelo($tituloCrear, $autorCrear, $anoCrear, $duracionCrear, $imaxeCrear);
    $novoTema->guardar();

    $arrayTemas = TemaModelo::mostrarTodos();
}







mostrarDatosHTML($arrayTemas);
