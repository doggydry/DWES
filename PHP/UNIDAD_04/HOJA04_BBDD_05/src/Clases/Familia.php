<?php
namespace Hospital\Clases;

class Familia extends Medico{

    private int $numPacientes;

    public function __construct($codigo, $nombre, $edad, Turno $turno,$numPacientes){
        parent::__construct($codigo, $nombre, $edad, $turno);
        $this->numPacientes=$numPacientes;
    }
    public function getnumPacientes(){
        return $this->numPacientes;
    }
    public function setNumPacientes($nuevoNumPacientes){
        if ($nuevoNumPacientes === $this->numPacientes){
            return 'El numero de pacientes debe ser superior al anterior';
        } else {
            return $this->numPacientes = $nuevoNumPacientes;
        }
    }

    public function __toString(){
        return parent::__toString().' Numero de pacientes: '.$this->getnumPacientes();
    }
}