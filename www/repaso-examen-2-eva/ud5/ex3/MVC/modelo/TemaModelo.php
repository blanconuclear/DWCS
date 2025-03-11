<?php
require_once 'Conexion.php';
require_once 'Tema.php';

class TemaModelo extends Tema
{

    public function __construct(string $titulo, string $autor, int $ano, int $duracion, string $imaxe)
    {
        parent::__construct($titulo, $autor, $ano, $duracion, $imaxe);
    }

    public static function mostrarTodos(): array
    {
        $pdo = new Conexion();
        $sql = "select * from tema";
        $stmt = $pdo->query($sql);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public static function borrarPorTitulo($tituloParaBorrar): bool
    {
        $pdo = new Conexion();

        $sql = "delete from tema where Titulo=:titulo";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['titulo' => $tituloParaBorrar]);
    }

    public static function buscarPorTitulo($tituloParaBuscar): array
    {

        $pdo = new Conexion();
        $sql = "select * from tema where Titulo like :titulo";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':titulo' => $tituloParaBuscar]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
