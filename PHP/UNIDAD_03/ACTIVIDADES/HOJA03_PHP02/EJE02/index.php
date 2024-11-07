<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $suma = 0;
    //Creamos la funcion con dos parametros
    function sumaDosNumeros($num1, $num2){
        return $num1 + $num2;
    }
    //Incializamos las variables
    $num1 = 7;
    $num2 = 8;
     //Llamamos a la funcion
    $resultado = sumaDosNumeros($num1, $num2);
    
    echo "La suma de $num1 y $num2 es: $resultado";
    ?>
</body>
</html>
