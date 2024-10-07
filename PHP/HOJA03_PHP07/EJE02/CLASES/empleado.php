<?php 
namespace CLASES;

use TRAITS\InformacionLaboral;
use TRAITS\informacionPersonal;

class Empleado {
    use informacionLaboral, informacionPersonal;

    public function mostrarInformacion(){
        return $this->getInformacionLaboral() . "\n" . $this->getInformacionPersonal();
    }
}
