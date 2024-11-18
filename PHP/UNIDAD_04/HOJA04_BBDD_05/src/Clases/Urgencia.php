<?php

namespace Hospital\Clases;

class Urgencia extends Medico
{
    private $unidad;

    public function __construct($codigo, $nombre, $edad, $turno, $unidad)
    {
        parent::__construct($codigo, $nombre, $edad, $turno);
        $this->unidad = $unidad;
    }
    public function getUnidad(){
        return $this->unidad;
    }
    public function setUnidad($nuevaUnidad){
        if ($nuevaUnidad === $this->unidad){
            return 'La uniadad no puede ser igual que la anterior';
        } else {
            return $this->unidad === $nuevaUnidad;
        }
    }
}
