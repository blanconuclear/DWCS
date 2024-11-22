
<?php
$servidor = "db";
$usuario = "root";
$passwd = "root";
$base = "proba";
try {
    //CONECTAMOS
    $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
    //Para xerar excepcións cando se informe dun erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Todo ben na conexión";
} catch (Exception $e) {
    echo "Erro ao conectar co servidor MySQL: " . $e->getMessage();
}

try {
    $pdoStatement = $pdo->query("select * from cliente");
} catch (PDOException $e) {
    echo "erro na consulta!";
} finally {
    $pdo = null; //PECHAMOS A CONEXIÓN COA BASE DE DATOS
}

?>
