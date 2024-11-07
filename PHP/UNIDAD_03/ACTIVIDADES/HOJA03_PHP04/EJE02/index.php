<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include 'Coche.php';  // Incluir la clase Coche

    // Crear un objeto de la clase Coche con matrícula y velocidad inicial
    $coche1 = new Coche(50,"ADBE413");

    // Mostrar los datos iniciales del coche
    echo $coche1->mostrarDatos() . "<br>";

    // Acelerar el coche en 30 km/h
    $coche1->acelera(30);
    echo "Después de acelerar: " . $coche1->mostrarDatos() . "<br>";

    // Intentar acelerar el coche para sobrepasar los 120 km/h
    $coche1->acelera(50);
    echo "Intento de sobrepasar 120 km/h: " . $coche1->mostrarDatos() . "<br>";

    // Frenar el coche en 70 km/h
    $coche1->frena(70);
    echo "Después de frenar: " . $coche1->mostrarDatos() . "<br>";

    // Intentar frenar el coche por debajo de 0 km/h
    $coche1->frena(50);
    echo "Intento de bajar la velocidad por debajo de 0 km/h: " . $coche1->mostrarDatos() . "<br>";
    ?>
</body>

</html>