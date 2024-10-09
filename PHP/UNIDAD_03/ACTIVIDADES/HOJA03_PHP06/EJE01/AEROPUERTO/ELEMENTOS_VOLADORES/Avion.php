<?php
namespace AEROPUERTO\ELEMENTOS_VOLADORES;

class Avion extends ElementoVolador {
    private string $companiaAerea;
    private string $fechaAlta;
    private int $altitudMaxima;

    public function __construct($nombre, $numAlas, $numMotores, $companiaAerea, $fechaAlta, $altitudMaxima) {
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->companiaAerea = $companiaAerea;
        $this->fechaAlta = $fechaAlta;
        $this->altitudMaxima = $altitudMaxima;
    }

    // Métodos getter y setter necesarios

    public function getCompaniaAerea() {
        return $this->companiaAerea;
    }

    public function setCompaniaAerea($companiaAerea) {
        $this->companiaAerea = $companiaAerea;
    }

    public function getFechaAlta() {
        return $this->fechaAlta;
    }

    public function setFechaAlta($fechaAlta) {
        $this->fechaAlta = $fechaAlta;
    }

    public function getAltitudMaxima() {
        return $this->altitudMaxima;
    }

    public function setAltitudMaxima($altitudMaxima) {
        $this->altitudMaxima = $altitudMaxima;
    }

    // Implementación del método volar
    public function volar($altitud) {
        if ($altitud < 0 || $altitud > $this->altitudMaxima) {
            echo "Error: Altitud fuera de rango.\n";
            return;
        }

        if ($this->velocidad >= 150) {
            while ($this->altitud < $altitud) {
                $this->altitud += 100;
                echo "El avión se eleva a $this->altitud metros.\n";
            }
        } else {
            echo "Error: La velocidad debe ser mayor o igual a 150 para volar.\n";
        }
    }

    // Mostrar información
    public function mostrarInformacion() {
        echo "Avión: $this->nombre, Compañía: $this->companiaAerea, Fecha de Alta: $this->fechaAlta, Altitud Máxima: $this->altitudMaxima.\n";
    }
}
?>