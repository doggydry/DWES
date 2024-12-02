<?php

namespace Funicular\Interfaces;

use Funicular\Models\UsuarioModel;

interface IUsuario
{
    public function registrar(UsuarioModel $usuario):bool;
    public function loguearse(UsuarioModel $usuario):bool;
}
