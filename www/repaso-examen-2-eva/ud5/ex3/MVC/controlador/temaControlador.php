<?php

declare(strict_types=1);
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
mostrarDatosHTML($arrayTemas);
