<?php
namespace Supermercado\Clases;

class Electronica extends Producto{
    private $plazoGarantia;

    public function __construct($codigo,$precio,$nombre,$categoria,$plazoGarantia) {
        parent::__construct($codigo,$precio,$nombre,$categoria);
        $this->plazoGarantia=$plazoGarantia;
    }
    public function getGarantia() {
        return $this->plazoGarantia;
    }
    public function setGarantia($nuevoPlazoGarantia) {
        if ($nuevoPlazoGarantia === $this->plazoGarantia){
            return "No puede ser igual";
        } else {
            return $this->plazoGarantia===$nuevoPlazoGarantia;
        }
    }

    public function __toString()
    {
        return parent::__toString().",Plazo de Garantia: ".$this->getGarantia();
    }
    

}    