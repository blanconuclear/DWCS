<?php

class Alumno
{
    public $nombre = "efren";
    private $edad;

    public function saludar()
    {
        echo "Hola " . $this->nombre;
    }
}

$alumno1 = new Alumno;

echo $alumno1->saludar();
