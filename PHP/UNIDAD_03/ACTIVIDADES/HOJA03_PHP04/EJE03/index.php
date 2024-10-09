<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include 'Monedero.php';  

    /** Creamos un objeto de la clase Monedero con dinero inicial*/ 
    $miMonedero1 = new Monedero(100);
    $miMonedero2 = new Monedero(200);

    /** Consultamos el dinero disponible en ambos monederos */ 
    echo $miMonedero1->consultarDinero();
    echo $miMonedero2->consultarDinero();

    /** Metemos dinero en el primer monedero */
    $miMonedero1->meterDinero(50);
    echo "Después de meter 50 euros:<br>";
    echo $miMonedero1->consultarDinero();

    /** Intentamos sacar más dinero del que se puede */
    $miMonedero1->sacarDinero(200);
    echo "Intento de sacar 200 euros:<br>";
    echo $miMonedero1->consultarDinero();

    /** Sacamos una cantidad válida */
    $miMonedero1->sacarDinero(30);
    echo "Después de sacar 30 euros:<br>";
    echo $miMonedero1->consultarDinero();

    /** Consultamos el número de monederos disponibles */
    echo $miMonedero1->consultarNumeroMonederos();

    /** Destruir un monedero y verificar el número de monederos disponibles */
    unset($miMonedero1);
    echo "Después de destruir un monedero:<br>";
    echo $miMonedero2->consultarNumeroMonederos();
    ?>


</body>

</html>