<?php

namespace Supermercado\Clases;
class Alimentacion extends Producto
{
    private $mesCaducidad;
    private $anioCaducidad;

    public function __construct($codigo, $precio, $nombre, $mesCaducidad, $anioCaducidad, $categoria)
    {
        parent::__construct($codigo, $precio, $nombre, $categoria);
        $this->mesCaducidad = $mesCaducidad;
        $this->anioCaducidad = $anioCaducidad;
    }

    public function getMesCaducidad()
    {
        return $this->mesCaducidad;
    }
    public function getAnioCaducidad()
    {
        return $this->anioCaducidad;
    }
    
    public function setMesCaducidad($nuevoMesCaducidad)
    {
        if ($nuevoMesCaducidad === $this->mesCaducidad) {
            return "No puede ser igual que el mes actual";
        } else {
            return $this->mesCaducidad = $nuevoMesCaducidad;
        }
    }
    public function setAnioCaducidad($nuevoAnioCaducidad)
    {
        if ($nuevoAnioCaducidad === $this->anioCaducidad) {
            return "No puede ser igual que el año actual";
        } else {
            return $this->anioCaducidad = $nuevoAnioCaducidad;
        }
    }
    public function __tostring()
    {
        return parent::__toString(). ", Mes de Caducidad: ". $this->getMesCaducidad().", Año de Caducidad: ". $this->getAnioCaducidad();
    }
}
