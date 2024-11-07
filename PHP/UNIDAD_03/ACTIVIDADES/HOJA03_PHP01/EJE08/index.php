<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//El factorial de un entero positivo n se define en principio como el producto de todos los números enteros positivos desde 1 hasta n
    //Una iteración y en cada vuelta multiplicar la posición del contador por la variable inicial
    function factorial($n)
    {
        $resultado = 1;
        for ($i = 1; $i <= $n; $i++) {
            $resultado = $resultado * $i;
        }
        return $resultado;
    }

    $n = 5;
    $resultado = factorial($n);
    echo 'El factorial del numero '.$n. ' es '.$resultado;
    ?>
?>

</body>
</html>