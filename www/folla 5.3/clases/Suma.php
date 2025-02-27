<?php
require 'Calculo.php';


class Suma extends Calculo
{
    public function calcular()
    {
        if ($this->operando1 !== null && $this->operando2 !== null)
            $this->resultado = $this->operando1 + $this->operando2;
    }
}
