<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $numCuenta = '1234-5678-90-1234567890';

    function mostarCE($numCuenta)
    {
        $valores = explode('-', $numCuenta);
        return ('El codigo de entidad es:</br> ' . $valores[0]);
    }

    function mostarCO($numCuenta)
    {
        $valores = explode('-', $numCuenta);
        return ("<br>El codigo de la oficina es:</br> "  . $valores[1]);
    }

    function mostarNM($numCuenta)
    {
        $valores = explode('-', $numCuenta);
        return ('<br>El número de la cuentas es:</br>' . $valores[3]);
    }

    function mostrarDC($numCuenta)
    {
        $valores = explode('-', $numCuenta);
        return ('<br>Los digitos de control de la cuenta son:</br> ' . $valores[2]);
    }

    function comprobarDO($numCuenta)
    {

    }
    echo mostarCE($numCuenta);
    echo mostarCO($numCuenta);
    echo mostarNM($numCuenta);
    echo mostrarDC($numCuenta);

    ?>
</body>

</html>