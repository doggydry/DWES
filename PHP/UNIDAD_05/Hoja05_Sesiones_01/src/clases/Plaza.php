<?php
namespace Sesiones\clases;

use Sesiones\Interfaces\IPlaza;
use Sesiones\Models\ModeloPlaza;

class Plaza {
    public function __construct(private IPlaza $interface){}

    public function mostrar(int $numero):ModeloPlaza{
        return $this->interface->mostrar($numero);
    }
    public function actualizar(int $numero):bool{
        return $this->interface->actualizar($numero);
    }
    public function borrar(int $numero):bool{
        return $this->interface->borrar($numero);
    }
    
}

