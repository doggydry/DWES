<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    /** Con esto incluimos la clase circulo */
        include 'Circulo.php';

    /** Crear un objeto de la clase circulo 
     * con un radio inicial de 6
    */
    $circulo = new Circulo(6);
      
    /** Obtener el valor del radio */ 
    echo "Radio inicial: " .$circulo->getRadio() . "<br>";

    /** SetRadio para cambiar el valor */
    $circulo->setRadio(10);
    echo "El nuevo radio es (setRadio): " .$circulo->getRadio() . "<br>";

    /** metodos mágicos __get y __set */
    
    $circulo->radio = 30;
    echo "Nuevo radio (__set): " .$circulo->radio . "<br>";
    ?>
</body>
</html>
