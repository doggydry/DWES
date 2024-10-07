<?php 
namespace TRAITS;

trait informacionPersonal{
    private $nombre;
    private $edad;
    private $direccion;

    public function setInformacionPersonal($nombre, $edad, $direccion){
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->direccion = $direccion;
    }

    public function getInformacionPersonal (){
        return "Nombre: {$this->nombre}, Edad: {$this->edad}, Direccion: {$this->direccion}";
    }

    public function actualizarInfo($nombre, $edad, $direccion ){
        $this->setInformacionPersonal($nombre, $edad, $direccion);
    }
}
?>