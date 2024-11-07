<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    function generarCapicuas($inicio, $fin)
    {
        $capicuas = []; // Array para almacenar los números capicúas

        for ($numero = $inicio; $numero <= $fin; $numero++) {
            // Convertimos el número a cadena
            $numeroStr = strval($numero);

            // Verificamos si es capicúa
            if ($numeroStr[0] === $numeroStr[2]) {
                $capicuas[] = $numero; // Agregamos el número capicúa al array
            }
        }

        return $capicuas; // Devolvemos el array de capicúas
    }

    // Generar y mostrar los números capicúas entre 100 y 999
    $capicuas = generarCapicuas(100, 999);
    echo "Números capicúas entre 100 y 999: " . implode(", ", $capicuas);
    //function esCapicua ($numero){
    //    //Aqui convertimos el numero a cadena para facilitar las comparaciones de digitos
    //    $numeroStr = strval($numero);
    //    $longitud = strlen($numeroStr);

    //    //Iniciamos los indices o punteros que nos ayudaran a recorrer
    //    //de izquierda y de derecha de forma paralela el numero

    //    $inicio = 0;
    //    $final = $longitud -1;

    //    //En este bucle while lo que hacemos es comparar los digitos
    //    while ($inicio < $final){
    //        if ($numeroStr[$inicio]!== $numeroStr[$final]){
    //            return false; //Aqui ya sabríamos que el numero no es capicua
    //        }
    //        $inicio++;
    //        $final--;
    //    }
    //     return true; //En este sería capicua
    //}

    //USO
    //$numero = 9102019;
    //if (esCapicua($numero)){
    //    echo "$numero es capicua";
    //} else {
    //    echo "$echo no es capicua";
    //}
    ?>



</body>

</html>