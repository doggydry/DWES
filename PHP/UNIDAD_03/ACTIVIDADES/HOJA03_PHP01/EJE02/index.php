<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $suma = 0 ;
        for ($i = 10; $i<=100; $i++){
            if ($i%2==0){
                $suma += $i;
               
            }
            
        }
        echo ('La suma de los numeros pares del 10 al 100 es: '. $suma);
    ?>
</body>

</html>