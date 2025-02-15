<?php

class Contacto
{
    private $nome;
    private $apelidos;
    private $tfno;

    public function __construct($nome, $apelidos, $tfno)
    {
        $this->nome = $nome;
        $this->apelidos = $apelidos;
        $this->tfno = $tfno;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getApelidos()
    {
        return $this->apelidos;
    }

    public function leTfno()
    {
        return $this->tfno;
    }

    public function asignaTfno($tfno)
    {
        if (is_numeric($tfno) && strlen($tfno) == 9) {
            $this->tfno = $tfno;
        } else {
            throw new Exception("Número de teléfono incorrecto.");
        }
    }

    public function setNome($nome)
    {
        $this->nome = ucfirst(strtolower($nome));
    }

    public function setApelidos($apelidos)
    {
        $this->apelidos = ucfirst(strtolower($apelidos));
    }

    public function mostrarInformacion()
    {
        echo "Nome: " . $this->getNome() . "<br>";
        echo "Apelidos: " . $this->getApelidos() . "<br>";
        echo "Teléfono: " . $this->leTfno() . "<br>" . "<br>";
    }

    public function __destruct()
    {
        echo "O obxecto está sendo destruído";
    }
}

// Crear 3 obxectos Contacto
$contacto1 = new Contacto("ana", "garcía", "123456789");
$contacto2 = new Contacto("luis", "martínez", "987654321");
$contacto3 = new Contacto("maría", "lópez", "456789123");

// Mostrar información usando métodos get
echo $contacto1->getNome() . "<br>";
echo $contacto1->getApelidos() . "<br>";
echo $contacto1->leTfno() . "<br>" . "<br>";

// Mostrar información usando mostraInformacion
$contacto1->mostrarInformacion() . "<br>";
$contacto2->mostrarInformacion() . "<br>";
$contacto3->mostrarInformacion() . "<br>";
