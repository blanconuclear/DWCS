<?php
require_once '../modelo/ArtigoModelo.php';
require_once '../vista/vistaArtigos.php';

$arrayArtigos= ArtigoModelo::seleccionaTodos();


formularioVista();

if ((isset($_POST['btnMostrarTodo']))) {
    artigosTodosVista($arrayArtigos);
}

if ((isset($_POST['btnSeleccionarPorNome']))) {
    formUnArtigo();
 }
 if ((isset($_POST['btnBuscarUnArtigo']))) {
    $artigoParaBuscar=$_POST['nomeArtigo'];

    $arrayArtigos= ArtigoModelo::seleccionaUn($artigoParaBuscar);



    artigoUnVista($arrayArtigos);

 }






