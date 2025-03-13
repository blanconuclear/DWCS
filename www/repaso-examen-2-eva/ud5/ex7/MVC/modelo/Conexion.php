<?php
class Conexion extends PDO
{
    public function __construct()
    {
        try {
            parent::__construct("mysql:host=dbXdebug;dbname=proba2", "root", "root");
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "conexion ok";
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
