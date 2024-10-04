<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /** Clase abstracta Medico */
    abstract class Medico
    {
        protected $nombre;
        protected $edad;
        protected $turno; 
        public function __construct($nombre, $edad, $turno)
        {
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->turno = $turno;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getEdad()
        {
            return $this->edad;
        }

        public function getTurno()
        {
            return $this->turno;
        }

        /** Como um toString */
        abstract public function getInfo();
    }

    /** Clase familia que hereda de médico */
    class Familia extends Medico
    {
        private $num_pacientes;

        public function __construct($nombre, $edad, $turno, $num_pacientes)
        {
            parent::__construct($nombre, $edad, $turno);
            $this->num_pacientes = $num_pacientes;
        }

        public function getNumPacientes()
        {
            return $this->num_pacientes;
        }

        public function getInfo()
        {
            return "Médico de Familia: {$this->nombre}, Edad: {$this->edad}, Turno: {$this->turno}, Pacientes: {$this->num_pacientes}";
        }
    }

    /** Clase Urgencia que hereda de médico */
    class Urgencia extends Medico
    {
        private $unidad;

        public function __construct($nombre, $edad, $turno, $unidad)
        {
            parent::__construct($nombre, $edad, $turno);
            $this->unidad = $unidad;
        }

        public function getUnidad()
        {
            return $this->unidad;
        }

        public function getInfo()
        {
            return "Médico de Urgencias: {$this->nombre}, Edad: {$this->edad}, Turno: {$this->turno}, Unidad: {$this->unidad}";
        }
    }
    ?>
</body>

</html>