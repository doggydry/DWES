<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class coche
    {
        private String $matricula;
        private float $velocidad;

        public function __construct($velocidad, $matricula)
        {
            $this->velocidad = $velocidad;
            $this->matricula = $matricula;
        }

        public function mostrarDatos() {
            return "Matrícula: " . $this->matricula . ", Velocidad: " . $this->velocidad . " km/h";
        }
        
        public function acelera($incremento) {
            if ($this->velocidad + $incremento > 120) {
                $this->velocidad = 120;  
            } else {
                $this->velocidad += $incremento;
            }
        }

        public function frena($decremento) {
            if ($this->velocidad - $decremento < 0) {
                $this->velocidad = 0;  // No bajar de 0 km/h
            } else {
                $this->velocidad -= $decremento;
            }
        }
    }

    ?>
</body>

</html>