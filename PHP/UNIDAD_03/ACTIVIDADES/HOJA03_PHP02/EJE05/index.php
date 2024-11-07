<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $num = 141.13;
    function esCapicua($num)
    {
        $numinv = 0;
        $cociente = $num;
        while ($cociente != 0) {
            $resto = $cociente % 10;
            $numinv = $numinv * 10 + $resto;
            $cociente = (int)($cociente / 10);
        }
        if ($num == $numinv)
            print "El número $num Es capicúa;a<br />";
        else
            print "El número $num NO es capicúa<br />";
    }
    function redondear($num)
    {
        return "Numero redondeado:".round($num);
    }

    function numDigitos ($num){
        return strlen($num);
    }
    echo redondear($num);
    echo esCapicua($num);
    echo numDigitos($num);

    ?>
</body>

</html>