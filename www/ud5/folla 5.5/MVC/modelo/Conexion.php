<?php

declare(strict_types=1);

class Conexion extends PDO
{
    private string $host = "dbXdebug";
    private string $db = "proba2";
    private string $user = "root";
    private string $pass = "root";
    private string $dsn;

    public function __construct()
    {
        $this->dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";

        try {
            parent::__construct($this->dsn, $this->user, $this->pass);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conexion ok";
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }
}
