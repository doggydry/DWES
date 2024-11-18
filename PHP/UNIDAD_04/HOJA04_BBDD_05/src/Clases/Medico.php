<?php 
namespace Hospital\Clases;

abstract class Medico{
    private $codigo;
    private $nombre;
    private $edad;
    private $turno;

    public function __construct($codigo, $nombre, $edad, Turno $turno) {  
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->turno = $turno;
    }
    public function getCodigo() {
        return $this->codigo;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getEdad() {
        return $this->edad;
    }
    public function getTurno() {
        return $this->turno;
    }

    public function setNombre($nuevoNombre) {
        if ($nuevoNombre=== $this->nombre){
            return 'El nombre no puede ser igual que el anterior';
        }else {
            return $this->nombre = $nuevoNombre;
        }
    }

    public function setTurno(Turno $nuevoTurno) {
        if ($nuevoTurno=== $this->turno){
            return 'El turno no puede ser igual que el anterior';
        } else{
            return $this->turno = $nuevoTurno;
        }
    }
    public function setEdad($nuevaEdad) {
        if ( $nuevaEdad=== $this->edad){
            return 'La edad no puede ser igual que la anterior';
        } else {
            return $this->edad = $nuevaEdad;
        }
    }
    public function __toString()
    {
        return 'Nombre: '.$this->getNombre().',Edad: '.$this->getEdad().'Turno: '.$this->getTurno();
    }
}