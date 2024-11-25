<?php
namespace Hospital\Clases;

class Turno {
    private int $id;
    private string $descripcion;
    private int $horario;

    public function __construct(int $id,string $descripcion, int $horario) {
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

    public function setDescripcion(int $nuevoHorario):int{
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