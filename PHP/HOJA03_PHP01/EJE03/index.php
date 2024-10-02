<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $cifra1 = 1;
    $cifra2 = 2;
    $cifra3 = 2;
    $numero = $cifra1.$cifra2.$cifra3;
    if ($cifra1 == $cifra3){
        echo 'El numero de tres digitos ' .$numero.' es capìcua';
    } else {
        echo 'El numero '.$numero. ' no es capicua';
    }
    ?>

</body>
</html>
