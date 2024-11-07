<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $PPK = 2.5;
    $numKiilometros = 800;
    $diasEstancia = 8;
    $precioBillete = $PPK * $numKiilometros;
    if ($diasEstancia > 7 && $numKiilometros > 800) {
        echo 'El precio original ' . $precioBillete . 'se ha reducido un 30%: ' . $precioBillete * 0.3;
    } else {
        echo 'Precio del billete:' . $precioBillete;
    }
    ?>
</body>

</html>