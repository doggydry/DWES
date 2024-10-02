<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Bucle externo: controla el número inicial en cada línea (desde 10 hasta 1)
    for ($i = 10; $i >= 1; $i--) {
        // Bucle interno: imprime los números de $i hasta 1
        for ($j = $i; $j >= 1; $j--) {
            echo $j . " "; // Imprimir el número con un espacio
        }
        echo "<br>"; // Nueva línea al final de cada fila
    }
    ?>
</body>

</html>