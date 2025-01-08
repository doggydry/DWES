<?php

namespace SessionExamen\Clases;

use SessionExamen\Interfaz\IUsuario;
use SessionExamen\Modelos\UsuarioModelo;

class Usuario
{
    private IUsuario $interfaz;

    public function __construct(IUsuario $interfaz)
    {
        $this->interfaz = $interfaz;
    }

    public function registrarse(UsuarioModelo $usuario): void
    {
        $this->interfaz->registrarse($usuario);
    }

    public function loguearse(UsuarioModelo $usuario): void
    {
        $this->interfaz->loguearse($usuario);
    }

    public function borrar(UsuarioModelo $usuario): void
    {
        $this->interfaz->borrar($usuario);
    }
}
