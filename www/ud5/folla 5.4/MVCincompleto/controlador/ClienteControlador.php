<?php
require_once '../modelo/ClienteModelo.php';
require_once '../vista/vistaCliente.php';

mostraFormularioInicio();
mostraFormularioCrear();


//SE QUERO LISTAR TODOS 
if (isset($_GET['todos'])) {
  $clientes = ClienteModelo::devolveTodos(); //UN PDOStatement. O CONTROLADOR PIDE DATOS
  // AO MODELO.  CONVIRTO A UN ARRAY E O DEVOLVO 
  while ($fila = $clientes->fetch(PDO::FETCH_ASSOC)) {
    $clienteArray[] = $fila;
  }
  mostraTaboaCliente($clienteArray); //CHAMO Á FUNCIÓN NA PARTE DA VISTA, PARA MOSTRAR
}

//  if( ...)   SEGUIRÍAN AS DIFERENTES CONDICIÓNS, CHAMANDO AOS MÉTODOS DO CONTROLADOR E
// 									MOSTRANDO RESULTADOS COAS FUNCIÓNS DA VISTA 

if (isset($_POST['eliminar'])) {
  $email = $_POST['eliminar'];
  ClienteModelo::borrarPorMail($email);
  header('Location: ClienteControlador.php');
  exit();
}



if (isset($_POST['crear'])) {
  $nome = $_POST['nome'];
  $apelido = $_POST['apelidos'];
  $email = $_POST['email'];

  $novoCliente = new ClienteModelo($nome, $apelido, $email);
  $novoCliente->guardar();

  header('Location: ClienteControlador.php');
  exit();
}

if (isset($_POST['editarFinal'])) {

  $emailId = $_POST['editarFinal'];
  $novoEmail = $_POST['novoEmail'] ?? null;
  $novoNome = $_POST['novoNome'] ?? null;
  $novosApelidos = $_POST['novosApelidos'] ?? null;

  ClienteModelo::actualizarCliente($novoEmail, $novoNome, $novosApelidos, $emailId);

  header('Location: ClienteControlador.php');
  exit();
}
