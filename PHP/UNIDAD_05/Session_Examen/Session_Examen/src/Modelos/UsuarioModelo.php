<?php

namespace SessionExamen\Modelos;

class UsuarioModelo
{

    private int $id = 0;
    private string  $usuario = "";
    private string $clave = "";

    public function __construct(
        int $id,
        string $usuario,
        string $clave
    ) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->clave = $clave;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getUsuario(): string
    {
        return $this->usuario;
    }
    public function getClave(): string
    {
        return $this->clave;
    }
}
