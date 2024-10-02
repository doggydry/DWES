<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function generarSerie($cantidad) {
    // Inicializamos el numerador y el denominador
    $numerador = 1;
    $denominador = 2;

    // Generamos la serie
    for ($i = 1; $i <= $cantidad; $i++) {
        echo "$numerador/$denominador<br>";

        // Incrementamos el numerador y multiplicamos el denominador por 2
        $numerador++;
        $denominador *= 2;
    }
}

// Llamamos a la función para generar los primeros 10 valores
generarSerie(10);
?>
</body>
</html>