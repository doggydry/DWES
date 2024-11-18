<?php
namespace Hospital\Clases;

class Turno {
    private $id;
    private $descripcion;

    private $horario;

    public function __construct($id, $descripcion, $horario) {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->horario = $horario;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getHorario(){
        return $this->horario;
    }

    public function setDescripcion($nuevoHorario){
        if ($nuevoHorario===$this->horario){
            return 'El horario no puede ser igual que el aneterior';
        } else{
            return $this->horario===$nuevoHorario;
        }
    }
    public function __tostring(){
        return 'Descripción: '.$this->getDescripcion().', Horario'.$this->getHorario();
    }
}