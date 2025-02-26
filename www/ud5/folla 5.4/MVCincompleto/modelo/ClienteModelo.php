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
    //... O RESTO DOS MÉTODOS DO CRUD

    public static function borrarPorMail(string $email): bool
    {
        $conexion = new Conexion();
        try {
            $pdoStmt = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE email = :email");
            return $pdoStmt->execute([':email' => $email]); // Retorna true si se ejecutó correctamente
        } catch (PDOException $e) {
            die("❌ Error al borrar cliente: " . $e->getMessage());
        }
    }

    public static function actualizarCliente(string $novoEmail, string $novoNome, string $novosApelidos, string $emailId): bool
    {

        $conexion = new Conexion();
        try {
            $sql = "UPDATE " . self::TABLA . " SET nome=:nome,apelidos=:apelidos,email=:email WHERE email = :emailId";
            $stmt = $conexion->prepare($sql);
            $resultado = $stmt->execute([
                ':nome' => $novoNome,
                ':apelidos' => $novosApelidos,
                ':email' => $novoEmail,
                ':emailId' => $emailId
            ]);

            return $resultado;
        } catch (PDOException $e) {
            die("❌ Error ao actualizar cliente: " . $e->getMessage());
        }
    }
}
