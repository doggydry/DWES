<?php

namespace SessionExamen\Interfaz;

use SessionExamen\Modelos\UsuarioModelo;

interface IUsuario
{
    public function registrarse(UsuarioModelo $usuario): void;
    public function loguearse(UsuarioModelo $usuario): void;
    public function borrar(UsuarioModelo $usuario): void;
}
