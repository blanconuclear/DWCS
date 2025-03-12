<?php

declare(strict_types=1);


class Conexion extends PDO
{
    public function __construct()
    {
        try {
            parent::__construct("mysql:host=dbXdebug;dbname=proba2", "root", "root");
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
