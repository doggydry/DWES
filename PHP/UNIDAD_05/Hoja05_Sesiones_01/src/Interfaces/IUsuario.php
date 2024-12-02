<?php
namespace Sesiones\Interfaces;

use Sesiones\Models\ModeloUsuario;

interface IUsuario{
    public function registrar(ModeloUsuario $usuario):bool;
    public function loguearse(ModeloUsuario $usuario):bool;

}