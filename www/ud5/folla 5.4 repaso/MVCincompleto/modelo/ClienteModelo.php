<?php

declare(strict_types=1);
require_once 'Conexion.php';
require_once 'Cliente.php';

class ClienteModelo extends Cliente
{

    public function __construct(string $nome, string $apelidos, string $email)
    {
        parent::__construct($nome, $apelidos, $email);
    }
    /* PARA Insertar un obxecto*/
    public function guardar(): bool
    {
        $conexion = new Conexion();

        try {
            $pdoStmt = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nome, apelidos,email) VALUES(:nome, :apelidos, :email)');
            $pdoStmt->bindParam(':nome', $this->nome);
            $pdoStmt->bindParam(':apelidos', $this->apelidos);
            $pdoStmt->bindParam(':email', $this->email);
            $pdoStmt->execute();
        } catch (PDOException $e) {
            die("Houbo un erro coa inserción: " . $e->getMessage());
        }
        $conexion = null;
        return true;
    }
    //DEVOLVE un array con todos os clientes da táboa. Método de clase
    public static function devolveTodos(): PDOStatement
    {
        $conexion = new Conexion();
        try {
            $consulta = "select * from clientes";
            $pdoStmt = $conexion->query($consulta);
        } catch (PDOException $e) {
            die("Houbo un erro en devolveTodos" . $e->getMessage());
        }
        return $pdoStmt;
    }


    public static function borrarPorMail($emailParaBorrar): bool
    {
        $conexion = new Conexion();

        try {
            $sql = "DELETE FROM " . self::TABLA . " WHERE email=:email";

            $pdo = $conexion->prepare($sql);
            return $pdo->execute(['email' => $emailParaBorrar]);
        } catch (PDOException $e) {
            die("Houbo un erro en devolveTodos" . $e->getMessage());
        }
    }

    public static function editarPorMail($nomeActualizado, $apelidosActualizado, $emailActualizado, $emailParaEditar): bool
    {
        $conexion = new Conexion();

        try {
            $sql = "UPDATE " . self::TABLA . " SET nome=:nome ,apelidos=:apelidos,email=:email WHERE email=:emailParaBorrar";
            $stmt = $conexion->prepare($sql);
            return $stmt->execute([
                'nome' => $nomeActualizado,
                'apelidos' => $apelidosActualizado,
                'email' => $emailActualizado,
                'emailParaBorrar' => $emailParaEditar
            ]);
        } catch (PDOException $e) {
            die("Houbo un erro en devolveTodos" . $e->getMessage());
        }
    }

    public static function buscarPorMail($email)
    {
        $conexion = new Conexion();

        try {
            $sql = "SELECT * FROM clientes WHERE email=:email";
            $stmt = $conexion->prepare($sql);
            $stmt->execute(['email' => $email]);

            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

            return $cliente;
        } catch (PDOException $e) {
            die("Houbo un erro en devolveTodos: " . $e->getMessage());
        }
    }
}
