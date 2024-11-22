<?php


//Conexión
$servidor = "db";
$usuario = "root";
$passwd = "root";
$base = "proba";

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
    echo "Conexión Ok!.<br>";
} catch (Exception $e) {
    echo "Erro na conexión: " . $e->getMessage();
}


try {
    $sql = "INSERT INTO cliente(nome,apelidos,codCliente) VALUES (:nome,:apelidos,:codCliente)";
    $stmt = $pdo->prepare($sql);

    //Valores para o cliente
    $nome = $_GET['nome'];
    $apelido = $_GET['apelido'];
    $codCliente = $_GET['codCliente'];

    //Executamos a inserción
    $stmt->execute([
        ':nome' => $nome,
        ':apelidos' => $apelido,
        ':codCliente' => $codCliente
    ]);

    echo "Cliente inserido cos marcadores coñecidos.<br>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $pdo = null; //PECHAMOS A CONEXIÓN COA BASE DE DATOS
}
