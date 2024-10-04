<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    interface Volador {

        public function acelerar($velocidad);
    }

    abstract class ElementoVolador implements Volador{
        
        private $nombre;
        private $numAlas;
        private $numMotores;
        private $altitud;
        private $velocidad;

        public function __construct($nombre, $numAlas, $numMotores)
        {
            $this->nombre = $nombre;
            $this->numAlas = $numAlas;
            $this->numMotores = $numMotores;
            $this->velocidad = 0;
            $this->altitud = 0;
        }

        public function getNombre(){
            return $this->nombre;
        }
        public function getNumALas(){
            return $this->nombre;
        }
        public function getNumMotores(){
            return $this->nombre;
        }
        public function getVelocidad(){
            return $this->nombre;
        }
        public function getAltitud(){
            return $this->altitud;
        }

        
    }

    ?>
</body>
</html>