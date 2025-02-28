<?php
require_once '../modelo/ClienteModelo.php';
require_once '../vista/vistaCliente.php';

mostraFormularioInicio();


//SE QUERO LISTAR TODOS 
if (isset($_GET['todos'])) {
  $clientes = ClienteModelo::devolveTodos(); //UN PDOStatement. O CONTROLADOR PIDE DATOS
  // AO MODELO.  CONVIRTO A UN ARRAY E O DEVOLVO 
  while ($fila = $clientes->fetch(PDO::FETCH_ASSOC)) {
    $clienteArray[] = $fila;
  }
  mostraTaboaCliente($clienteArray); //CHAMO Á FUNCIÓN NA PARTE DA VISTA, PARA MOSTRAR
};


if (isset($_POST['btnEliminar'])) {
  $emailParaBorrar = $_POST['btnEliminar'];

  ClienteModelo::borrarPorMail($emailParaBorrar);
}


if (isset($_POST['bntCrear'])) {
  $nome = $_POST['nome'];
  $apelidos = $_POST['apelidos'];
  $email = $_POST['email'];

  $novoCliente = new ClienteModelo($nome, $apelidos, $email);
  $novoCliente->guardar();
}

if (isset($_POST['bntActualizar'])) {
  $emailParaEditar = $_POST['bntActualizar'];

  $nomeActualizado = $_POST['novoNome'];
  $apelidosActualizado = $_POST['novoApelidos'];
  $emailActualizado = $_POST['novoEmail'];

  ClienteModelo::editarPorMail($nomeActualizado, $apelidosActualizado, $emailActualizado, $emailParaEditar);
}


if (isset($_GET['btnBuscarMail'])) {
  $email = $_GET['buscarPorMail'];
  $cliente = ClienteModelo::buscarPorMail($email);

  if ($cliente) {
    mostraTaboaCliente([$cliente]);
  }
}
