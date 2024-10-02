<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ejericio 1 </h1>
    <?php
    function cargar()
    {
        $array = [];
        for ($i = 0; $i < 20; $i++) {
            $array [] = rand(1,50);
        }
        return $array;
    }

    function ordenar ($array){
        sort($array);
        return $array;
    }

    function mezclar ($array1, $array2){
        //inicalizamos un array vacion donde almacenar los dos arrays mezclados
        $resultado  = [];
        //i para recorrer array1 y j para recorrer array2. ambos a 0
        $i = $j = 0;
        //continua mientras haya elementos en ambos arrays
        //en la comparacion se queda con el mayor 
        while ($i < count($array1) && $j < count($array2)){
            if ($array1[$i] < $array2 [$j]){
                $resultado []= $array1[$i];
                $i++;
            } else {
                $resultado []= $array2[$j];
                $j++;
            }
        }
        while ($i < count($array1)){
            $resultado [] = $array1[$i];
            $i++;
        }
        while ($j < count($array2)){
            $resultado[] = $array2[$j];
            $j++;
        }
        return $resultado;
    }

    $array1 = cargar();
    $array2 = cargar();
    $array1 = ordenar($array1);
    $array2 = ordenar($array2);


    $mezcla = mezclar ($array1, $array2);

    echo "Array 1: " . implode(", ", $array1) . "<br>";
    echo "Array 2: " . implode(", ", $array2) . "<br>";
    echo "Array mezclado: " . implode(", ", $mezcla) . "<br>";
    ?>
</body>

</html>