<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
class Circulo {
    public $radio;

    // constructor de la clase
    public function __construct($radio) {
        $this->radio = $radio;
    }

    // método setRadio
    public function setRadio($nuevo_radio) {
        $this->radio = $nuevo_radio;
    }

    // método getRadio
    public function getRadio() {
        return $this->radio;
    }

    // Comentamos los métodos set y get
    /*
    public function setRadio($nuevo_radio) {
        $this->radio = $nuevo_radio;
    }

    public function getRadio() {
        return $this->radio;
    }
    */

    // métodos mágicos __set y __get
    public function __set($nombre, $valor) {
        if (property_exists($this, $nombre)) {
            $this->$nombre = $valor;
        }
    }

    public function __get($nombre) {
        if (property_exists($this, $nombre)) {
            return $this->$nombre;
        }
    }
}
?>

</body>
</html>