<?php
namespace Supermercado\Clases;

class Categoria
{
    private $id;
    private $nombre;

    public function __construct($id, $nombre)
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nuevoNombre)
    {
        if ($nuevoNombre === $this->nombre) {
            return "No puede tener el mismo nombre";
        } else {
           return  $this->nombre = $nuevoNombre;
        }
    }
    public function __toString(){
        return "Nombre: $this->nombre";
    }
}
