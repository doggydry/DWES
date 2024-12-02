<?php

namespace Funicular\Class;

use Funicular\Interfaces\IUsuario;
use Funicular\Models\UsuarioModel;

class Usuario
{

    public function __construct(private readonly IUsuario $interface) {}

    public function registrar(UsuarioModel $usuario): bool
    {
        return $this->interface->registrar($usuario);
    }
    public function loguearse(UsuarioModel $usuario): bool
    {
        return $this->interface->loguearse($usuario);
    }
}
