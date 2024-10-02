<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    /*pasamos por parámetro el dni como int por que 
    tenemos que operar con él
    */
    function calcular_letra_DNI(int $dni){
        /* array que contien las letras correspondientes de la 
        diviison por 23
        */
        $letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        // divide el modulo para obtener el resto
        $resto = $dni  % 23;
        // y con el resto accede a la posicion correspondiente del array
        $letra = $letras[$resto];

        echo "EL NIF es: ". $dni.$letra; 
    }

    calcular_letra_DNI(72222290);
    ?>
</body>
</html>