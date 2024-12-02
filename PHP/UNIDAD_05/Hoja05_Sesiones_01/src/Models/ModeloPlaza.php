<?php

namespace Sesiones\Models;

class ModeloPlaza
{
    private int $numero;
    private bool $reservada;
    private float $precio;
    private string $dni_pasajero;


    public function __construct() {}

    public function getNumero():int{
        return $this->numero;
    }
    public function getReservada():bool{
        return $this->reservada;
    }
    public function getPrecio():float{
        return $this->precio;
    }
    
    public function getDni_pasajero():string{
        return $this->dni_pasajero;
    }
    public function setNumero(int $numero):int{
        return $this->numero = $numero;
    }
    public function setReservada(bool $reservada):bool{
        return $this->reservada = $reservada;
    }
    public function setPrecio(float $precio):float{
        return $this->precio = $precio;
    }
    
    public function setDni_pasajero(string $dni_pasajero):string{
        return $this->dni_pasajero = $dni_pasajero;
    }
}
