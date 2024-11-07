<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'Cuenta.php'; // Asegúrate de incluir el archivo con las clases

// Crear un objeto de CuentaCorriente
$cuentaCorriente = new CuentaCorriente("123456789", "Juan Pérez", 1000, 10);
$cuentaCorriente->ingreso(200);
$cuentaCorriente->reintegro(50);
echo $cuentaCorriente->mostrar();
echo "¿Es preferencial? " . ($cuentaCorriente->esPreferencial(500) ? "Sí" : "No") . "<br><br>";

// Crear un objeto de CuentaAhorro
$cuentaAhorro = new CuentaAhorro("987654321", "Ana López", 500, 5, 2);
$cuentaAhorro->aplicaInteres();
echo $cuentaAhorro->mostrar();
?>

</body>
</html>