<?php

namespace Hospital\Clases;

class Urgencia extends Medico
{
    private $unidad;

    public function __construct($id, $nombre, $edad, $turno, $unidad)
    {
        parent::__construct($id, $nombre, $edad, $turno);
        $this->unidad = $unidad;
    }
    public function getUnidad(){
        return $this->unidad;
    }
    public function getEspecialidad(): string {
        return "Urgencia";
    }
    public function setUnidad($nuevaUnidad){
        if ($nuevaUnidad === $this->unidad){
            return 'La uniadad no puede ser igual que la anterior';
        } else {
            return $this->unidad === $nuevaUnidad;
        }
    }

    public function __toString(){
        return parent::__toString().'-'.$this->getUnidad();
    }
}
