<?php
declare(strict_types= 1);
require_once 'Conexion.php';
require_once 'Artigo.php';

class ArtigoModelo extends Artigo{

    public function __construct(string $nomeArtigo, int $prezo, string $imaxe){
        
    parent::__construct($nomeArtigo, $prezo, $imaxe);
    }

    public static function seleccionaTodos():array{
        $pdo = new Conexion();
        $sql= "select * from " . self::TABLA;
        $stmt=$pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function  seleccionaUn($artigoParaBuscar):array{
        $pdo = new Conexion();
        $sql= "select * from " . self::TABLA . " where nomeArtigo = :nome";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([
            ':nome'=> $artigoParaBuscar
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }






   
}