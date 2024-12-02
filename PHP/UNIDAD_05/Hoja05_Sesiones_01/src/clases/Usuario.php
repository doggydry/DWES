<?php
namespace Sesiones\clases;

use Sesiones\Interfaces\IUsuario;
use Sesiones\Models\ModeloUsuario;

class Usuario{

    public function __construct(private IUsuario $interface){}

    public function registrar(ModeloUsuario $usuario):bool{
        return $this->interface->registrar($usuario);
    }
    public function loguearse(ModeloUsuario $usuario):bool{
        return $this->interface->loguearse($usuario);
    }

}