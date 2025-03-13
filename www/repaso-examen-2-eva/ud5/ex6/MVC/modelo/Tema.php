<?php

declare(strict_types=1);

class Tema
{
    protected string $titulo;
    protected string $autor;
    protected int $ano;
    protected int $duracion;
    protected string $imaxe;
    const TABLA = "tema";


    public function __construct(string $titulo, string $autor, int $ano, int $duracion, string $imaxe)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ano = $ano;
        $this->duracion = $duracion;
        $this->imaxe = $imaxe;
    }
}
