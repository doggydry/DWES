<?php 
namespace AEROPUERTO\GESTION;

use AEROPUERTO\ELEMENTOS_VOLADORES\ElementoVolador;
use AEROPUERTO\ELEMENTOS_VOLADORES\Helicoptero;
use AEROPUERTO\ELEMENTOS_VOLADORES\Avion;

class Aeropuerto {
    private $elementosVoladores;

    public function __construct() {
        // Inicializamos el array de elementos voladores
        $this->elementosVoladores = [];
    }

    // Método para insertar un ElementoVolador en el array
    public function insertar(ElementoVolador $elemento) {
        $this->elementosVoladores[] = $elemento;
    }

    // Método para buscar un ElementoVolador por nombre
    public function buscar($nombre) {
        foreach ($this->elementosVoladores as $elemento) {
            if ($elemento->getNombre() === $nombre) {
                $elemento->mostrarInformacion(); // Mostramos la información del elemento encontrado
                return $elemento;
            }
        }
        echo "Elemento volador no encontrado.\n";
        return null;
    }

    // Método para listar aviones de una compañía específica
    public function listarCompania($compania) {
        $encontrado = false;
        foreach ($this->elementosVoladores as $elemento) {
            // Verificamos si el elemento es un Avión y si su compañía coincide
            if ($elemento instanceof Avion && $elemento->getCompaniaAerea() === $compania) {
                $elemento->mostrarInformacion();
                $encontrado = true;
            }
        }

        if (!$encontrado) {
            echo "Compañía no encontrada.\n";
        }
    }

    // Método para listar helicópteros con un número de rotores específico
    public function rotores($numRotores) {
        $encontrado = false;
        foreach ($this->elementosVoladores as $elemento) {
            // Verificamos si el elemento es un Helicóptero y su número de rotores coincide
            if ($elemento instanceof Helicoptero && $elemento->getNRotor() === $numRotores) {
                $elemento->mostrarInformacion();
                $encontrado = true;
            }
        }

        if (!$encontrado) {
            echo "No se encontraron helicópteros con ese número de rotores.\n";
        }
    }

    // Método para despegar un ElementoVolador, se acelera y vuela
    public function despegar($nombre, $altitud, $velocidad) {
        // Buscamos el elemento por nombre
        $elemento = $this->buscar($nombre);

        if ($elemento !== null) {
            // Aceleramos el elemento a la velocidad indicada
            $elemento->acelerar($velocidad);
            // Volamos el elemento a la altitud indicada
            $elemento->volar($altitud);
            return $elemento;
        }

        echo "No se pudo realizar el despegue.\n";
        return null;
    }
}
