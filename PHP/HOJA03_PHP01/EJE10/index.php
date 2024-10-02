<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function esPrimo($numero)
    {
        // Verificamos si el número es menor o igual a 1
        if ($numero <= 1) {
            return false;
        }

        // Verificamos divisores desde 2 hasta la raíz cuadrada del número
        for ($i = 2; $i <= sqrt($numero); $i++) {
            if ($numero % $i == 0) {
                return false; // Si encontramos un divisor, no es primo
            }
        }

        return true; // Si no encontramos divisores, es primo
    }

    // Ejemplo: Verificar si un número es primo
    $numero = 29;
    if (esPrimo($numero)) {
        echo "$numero es primo.";
    } else {
        echo "$numero no es primo.";
    }

    ?>
</body>

</html>