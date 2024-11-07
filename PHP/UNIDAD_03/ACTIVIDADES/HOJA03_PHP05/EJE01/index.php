<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'Empleado.php';

    /** Creamos un objeto de la case Empleado */
     $empleado = new Empleado("Luis", 1500);
     echo "Empleado: " .$empleado->getNombre() . " | Sueldo: " .$empleado->getSueldo() . "€<br>";

     /** Creamos un objeto de la clase Encargado*/
     $encargado = new Encargado("Paco", 1500);
     echo "Encargado: " .$encargado->getNombre(). " | Sueldo: " .$encargado->getSueldo(). "€<br>";
    
    ?>
</body>
</html>