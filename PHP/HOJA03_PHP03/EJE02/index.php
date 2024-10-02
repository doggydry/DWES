<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 2</h1>
    <?php
    function desglose(float $cantidad) {            
        $monedas = [2, 1, 0.5, 0.2, 0.1, 0.05, 0.02, 0.01];
        $dinero = $cantidad;

        foreach ($monedas as $moneda) {
            // Calcular cuántas monedas de este tipo se pueden usar
            $numMonedas = intval($dinero / $moneda);

            // Solo mostrar si se usa al menos una moneda de este tipo
            if ($numMonedas > 0) {
                echo "$numMonedas monedas de: €$moneda <br>";
            }

            // Restar el valor de esas monedas del dinero restante
            $dinero -= $numMonedas * $moneda;
        }
    }
    
    // Llamar a la función con la cantidad de ejemplo
    desglose(1223.60);
    
    ?>
</body>
</html>
