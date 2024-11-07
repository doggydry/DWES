<?php 
namespace CLASES;

use TRAITS\informacionLaboral;
use TRAITS\informacionPersonal;

class Empleado {
    use informacionLaboral, informacionPersonal;

    public function mostrarInformacion(){
        return $this->getInformacionLaboral() . "\n" . $this->getInformacionPersonal();
    }
}
