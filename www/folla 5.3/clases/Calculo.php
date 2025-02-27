<?php

abstract class Calculo
{
    protected $operando1;
    protected $operando2;
    protected $resultado;


    public function setOperando1($valor)
    {
        $this->operando1 = $valor;
    }

    public function setOperando2($valor)
    {
        $this->operando2 = $valor;
    }

    public function getResultado()
    {
        return $this->resultado;
    }

    abstract public function calcular();
}
