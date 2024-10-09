<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //Definimos una tabla con sus titulos
    echo "<table border = '1'";
    echo "<tr><th>Nombre de las variables</th><th>Valor de las variables</th></tr>";
    /*Declaramos el foreach para recorrer el array
    y mostrar la informacion clave-valor en cada 
    iteracion
    */
    foreach($_SERVER as $clave => $valor){
        echo "<tr>
        <td>$clave</td>
        ";
        echo "
        <td>$valor</td>
        </tr>";
    }
    echo "</table>"

    ?>
</body>

</html>