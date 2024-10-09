<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Función que verifica si un número es primo
function esPrimo($numero) {
    if ($numero <= 1) {
        return false;
    }
    
    // Verificar divisores desde 2 hasta la raíz cuadrada del número
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return false; // Si encontramos un divisor, no es primo
        }
    }
    
    return true; // Si no encontramos divisores, es primo
}

// Bucle para recorrer los números del 3 al 999
for ($i = 3; $i <= 999; $i++) {
    if (esPrimo($i)) {
        echo $i . " "; // Si el número es primo, lo mostramos
    }
}
?>

</body>
</html>