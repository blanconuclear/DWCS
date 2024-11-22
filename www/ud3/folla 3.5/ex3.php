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


//Insertar datos

// Inserir cliente con marcadores anónimos
try {
    $sql = "INSERT INTO cliente(nome,apelidos,codCliente) VALUES (?,?,?)";
    $stmt = $pdo->prepare($sql);

    echo "Todo correcto con marcadores anónimos.<br>";

    //Executar inserción
    $stmt->execute(["Jose", "López", 400]);
} catch (Exception $e) {
    echo "Erro na execución: " . $e->getMessage();
}


//Cos marcadores coñecidos e con 3 variables $codCliente, $nome e $apelido
try {
    $sql = "INSERT INTO cliente (nome,apelidos,codCliente) VALUES (:nome, :apelidos, :codCliente)";

    // Preparar a consulta
    $stmt = $pdo->prepare($sql);

    //Valores para o cliente
    $nome = "Efrén";
    $apelido = "Corzón";
    $codCliente = 300;

    //Executar a inserción
    $stmt->execute([':nome' => $nome, ':apelidos' => $apelido, ':codCliente' => $codCliente]);
    echo "Cliente inserido cos marcadores coñecidos.<br>";
} catch (PDOException $e) {
    echo "Erro ao inserir cos marcadores coñecidos: " . $e->getMessage();
}

// Inserir cliente empregando un array asociativo
try {
    $sql = "INSERT INTO cliente (nome,apelidos,codCliente) VALUES (:nome, :apelidos, :codCliente)";
    $stmt = $pdo->prepare($sql);

    //Valores para o cliente
    $cliente = [
        'nome' => "Andrés",
        'apelidos' => "Vázquez",
        'codCliente' => 500
    ];

    //Executar inserción
    $stmt->execute($cliente);
    echo "Cliente inserido empregando un array asociativo.<br>";
} catch (PDOException $e) {
    echo "Erro ao inserir empregando un array asociativo: " . $e->getMessage();
}
