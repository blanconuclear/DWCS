<?php
declare(strict_types= 1);

class Artigo{
    protected string $nomeArtigo;
    protected int $prezo;
    protected string $imaxe;

    const TABLA = "artigos";

    public function __construct(string $nomeArtigo, int $prezo, string $imaxe){
        $this->nomeArtigo = $nomeArtigo;    
        $this->prezo = $prezo;
        $this->imaxe = $imaxe;

    }

}