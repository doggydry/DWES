<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function generarFibonacci($cantidad) {
    // Inicializamos los dos primeros números de la secuencia
    $fibonacci = [0, 1];

    // Generamos la secuencia hasta alcanzar la cantidad deseada
    for ($i = 2; $i < $cantidad; $i++) {
        // El siguiente número es la suma de los dos anteriores
        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }

    // Devolvemos el array con la secuencia de Fibonacci
    return $fibonacci;
}

// Llamamos a la función y generamos los primeros 10 números de Fibonacci
$fibonacci = generarFibonacci(10);

// Mostramos la secuencia
echo implode(", ", $fibonacci);
?>

</body>
</html>