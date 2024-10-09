<?php
namespace AEROPUERTO\ELEMENTOS_VOLADORES;

abstract class ElementoVolador implements Volador {
    protected $nombre;
    protected $numAlas;
    protected $numMotores;
    protected $altitud = 0;
    protected $velocidad = 0;

    public function __construct($nombre, $numAlas, $numMotores) {
        $this->nombre = $nombre;
        $this->numAlas = $numAlas;
        $this->numMotores = $numMotores;
    }

    public function volando() {
        return $this->altitud > 0;
    }

    public function acelerar($velocidad) {
        $this->velocidad = $velocidad;
    }

    abstract public function volar($altitud);
    abstract public function mostrarInformacion();
}
?>
