<?php
class Cliente
{
    // protected: Solo la propia clase y sus clases hijas pueden acceder a la propiedad o método.
    // private: Solo la propia clase puede acceder a la propiedad o método.
    // public: Se puede acceder desde cualquier parte del código.
    protected string $nome;
    protected $apelidos;
    protected $email;
    const TABLA = 'clientes';

    public function __construct($nom, $apel, $mail)
    {
        $this->nome = $nom;
        $this->apelidos = $apel;
        $this->email = $mail;
    }

    public function mostra(): void
    {
        echo "Nome:{$this->nome}, apelidos:{$this->apelidos}, email:{$this->email} <br>";
    }
}
