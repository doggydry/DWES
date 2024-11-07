<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function mostrarNumerosConSumaIgualProducto($inicio, $fin) {
    for ($numero = $inicio; $numero <= $fin; $numero++) {
        // Convertimos el número en cadena para extraer sus dígitos
        $numeroStr = strval($numero);
        
        // Obtenemos los dígitos
        $digito1 = intval($numeroStr[0]); // Primer dígito
        $digito2 = intval($numeroStr[1]); // Segundo dígito
        $digito3 = intval($numeroStr[2]); // Tercer dígito

        // Calculamos la suma y el producto
        $suma = $digito1 + $digito2 + $digito3;
        $producto = $digito1 * $digito2 * $digito3;

        // Verificamos si la suma es igual al producto
        if ($suma == $producto) {
            echo $numero . " cumple que la suma y el producto de sus dígitos son iguales.<br>";
        }
    }
}

// Llamada a la función para mostrar los números entre 100 y 999 que cumplen la condición
mostrarNumerosConSumaIgualProducto(100, 999);
?>

</body>
</html>