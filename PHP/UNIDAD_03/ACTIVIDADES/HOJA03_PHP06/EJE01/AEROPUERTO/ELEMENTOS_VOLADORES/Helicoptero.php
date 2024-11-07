<?php
namespace AEROPUERTO\ELEMENTOS_VOLADORES;

class Helicoptero extends ElementoVolador {
    private string $propietario;
    private int $nRotor;

    public function __construct($nombre, $numAlas, $numMotores, $propietario, $nRotor) {
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->propietario = $propietario;
        $this->nRotor = $nRotor;
    }

    // Métodos getter y setter necesarios

    public function getPropietario() {
        return $this->propietario;
    }

    public function setPropietario($propietario) {
        $this->propietario = $propietario;
    }

    public function getNRotor() {
        return $this->nRotor;
    }

    public function setNRotor($nRotor) {
        $this->nRotor = $nRotor;
    }

    // Implementación del método volar
    public function volar($altitud) {
        if ($altitud > 100 * $this->nRotor) {
            echo "Error: Altitud mayor a la permitida por los rotores.\n";
            return;
        }

        while ($this->altitud < $altitud) {
            $this->altitud += 20;
            echo "El helicóptero se eleva a $this->altitud metros.\n";
        }
    }

    // Mostrar información
    public function mostrarInformacion() {
        echo "Helicóptero: $this->nombre, Propietario: $this->propietario, Número de Rotores: $this->nRotor.\n";
    }
}
?>