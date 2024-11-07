<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function validarFecha ($fecha)
    {
        $valores = explode('/', $fecha);
        if (count($valores) == 3 & checkdate($valores[1], $valores[0], $valores[2])) {
            return "La fecha es correcta</br>";
        }
        return "La fecha es incorrecta";
    }

    var_dump(validarFecha('30/07/2024'));
    var_dump(validarFecha('32/02/2024'));

    ?>
</body>

</html>