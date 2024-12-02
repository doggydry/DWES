<?php

namespace Sesiones\Models;

class ModeloPasajero
{
    private string $dni;
    private string $nombre;
    private string $sexo;
    private int $numero_plaza;

    public function __construct() {}
    public function getDNI(): string
    {
        return $this->dni;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getSexo(): string
    {
        return $this->sexo;
    }
    public function getNumero_plaza(): int
    {
        return $this->numero_plaza;
    }
    public function setDNI(string $dni)
    {
        return $this->dni = $dni;
    }

    public function seNombre(string $nombre)
    {
        return $this->nombre = $nombre;
    }
    public function setSexo(string $sexo)
    {
        return $this->sexo = $sexo;
    }
    public function setNumero_plaza(int $numero_plaza)
    {
        return $this->numero_plaza = $numero_plaza;
    }
}
