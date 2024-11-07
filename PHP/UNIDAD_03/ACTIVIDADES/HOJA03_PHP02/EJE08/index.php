<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //Variable de la cadena
    $var = "Comer algas es realmente sano";

    $posicion = strpos($var, "anacardo");

    //todo esto es para darle la vuelta al array y volverlo a pasarlo a cadena
    $valores = explode(" ", $var);
    $alReves = array_reverse($valores);
    $fraseInvertida =  implode(" ", $alReves);
    
    //strpos para sacar la posicion de la palabra 
    echo "La palabra algas está en la posicion:" . strpos($var, "algas");
    echo ("</br>" . str_replace("realmente", "muy", $var));
  
    if ($posicion === false) {
        echo "<br>La palabra 'anacardo' no existe en la cadena";
    }

    echo "<br>Frase al revés: ". $fraseInvertida;
    echo "<br>La vocal e se encuentra ".substr_count($var, 'e'). " veces en la cadena: <br>".$var;
    ?>
</body>

</html>