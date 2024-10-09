<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    class Monedero
    {
        private $dinero;
        /** Atribto estático que cuenta los monederos */
        private static $numero_monederos = 0;

        /** Con este constructor generamos un monedero
         * con el dinero pasado por parametro, comprobando que 
         * no sea negativo
         */
        public function __construct($dinero_inicial)
        {
            $this->dinero = max(0, $dinero_inicial);
            /** Con esto incrementamos el numero de monederos 
             * cada vez que creemeos un objeto
             */
            Monedero::$numero_monederos++;
        }

        /** Destructor que se ejecuta al destruir el objeto */
        public function __destruct()
        {
            Monedero::$numero_monederos--;  // Decrementa el número de monederos
        }

        /** Método para meter dinero en el monedero */
        public function meterDinero($cantidad)
        {
            if ($cantidad > 0) {
                $this->dinero += $cantidad;
            } else {
                echo "Cantidad inválida para agregar.<br>";
            }
        }

        /** Método para sacarlo*/
        public function sacarDinero($cantidad)
        {
            if ($cantidad > 0 && $cantidad <= $this->dinero) {
                $this->dinero -= $cantidad;
            } else {
                echo "No se puede sacar más dinero del que hay disponible o cantidad inválida.<br>";
            }
        }

        /** Método para acceder al saldo disponible*/ 
        public function consultarDinero()
        {
            return "Dinero disponible: " . $this->dinero . " euros<br>";
        }

        // Método para consultar el número de monederos activos
        public function consultarNumeroMonederos()
        {
            return "Número de monederos creados: " . Monedero::$numero_monederos . "<br>";
        }
    }
    ?>
</body>
</html>