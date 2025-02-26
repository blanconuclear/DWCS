<?php

declare(strict_types=1);

class Conexion extends PDO
{
    private string $host = "db";
    private string $db = "tienda";
    private string $user = "root";
    private string $pass = "root";
    private string $dsn;

    public function __construct()
    {
        $this->dsn = "mysql:host={$this->host};dbname={$this->db}";

        try {
            parent::__construct($this->dsn, $this->user, $this->pass);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("❌ Error en la conexión: " . $e->getMessage());
        }
    }
}
