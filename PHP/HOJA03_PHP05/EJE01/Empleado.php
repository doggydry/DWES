<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
     class Empleado {
        /** Atributos privados */
        private $nombre;
        private $sueldo_base;

        /** Constructor para inicializar los atributos */

        public function __construct($nombre, $sueldo_base)
        {
            $this-> nombre = $nombre;
            $this-> sueldo_base = $sueldo_base;
        }

        /** Método para sacar el sueldo */
        public function getSueldo(){
            return $this->sueldo_base;
        }

        /** Método para obtener el nombre */

        public function getNombre (){
            return $this->nombre;
        }
     }

     class Encargado extends Empleado {

        /**Metodo que sobrescribe getSueldo para incrementar el 15% 
         * Usamos parent para acceder al metodo de la clase padre 
         * Empleado
        */
        public function getSueldo (){
            return parent::getSueldo() * 1.15;
        }

     }
    
    ?>
</body>
</html>
