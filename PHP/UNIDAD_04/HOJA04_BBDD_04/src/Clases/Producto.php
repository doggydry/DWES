<?php
namespace Supermercado\Clases;

class Producto{
    protected $codigo;
    protected $precio;
    protected $nombre;
    protected $categoria;

    public function __construct($codigo, $precio, $nombre, Categoria $categoria){
        $this->codigo = $codigo;
        $this->precio = $precio;
        $this->nombre = $nombre;
        $this->categoria = $categoria;
    }
    public function getCodigo(){
        return $this->codigo;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getCategoria(){
        return $this->categoria;
    }
    
    public function setCodigo ($nuevoCodigo){
        if ($nuevoCodigo===$this->codigo){
            return "No puede tener el mismo codigo";
        } else {
            return $this->codigo = $nuevoCodigo;
        }
    }
    public function setPrecio ($nuevoPrecio){
        if ($nuevoPrecio===$this->codigo){
            return "No puede tener el mismo codigo";
        } else {
            return $this->precio = $nuevoPrecio;
        }
    }
    public function setNombre ($nuevoNombre){
        if ($nuevoNombre===$this->codigo){
            return "No puede tener el mismo codigo";
        } else {
            return $this->nombre = $nuevoNombre;
        }
    }
    public function setCategoria (Categoria $nuevaCategoria){
        $this->categoria = $nuevaCategoria;
    }
    public function __toString(){
        return "Codigo:". $this->getCodigo(). ", Nombre: ". $this->getNombre().", Precio: " .$this->getPrecio(). ",Categoria: ".$this->getCategoria();
    }

}