<?php
namespace App\classes;

class Usuario
{
    private int $id;
    private string $correo;
    private string $clave;

    public function __construct(int $id, string $correo, string $clave)
    {
        $this->id = $id;
        $this->correo = $correo;
        $this->clave = $clave;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getCorreo(): string
    {
        return $this->correo;
    }

    public function getClave(): string
    {
        return $this->clave;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }

    public function setClave(string $clave): void
    {
        $this->clave = $clave;
    }
}
?>