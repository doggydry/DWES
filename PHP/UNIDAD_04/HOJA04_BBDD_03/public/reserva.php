<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use Funicular\Clases\FuncionesBD;
use Funicular\Clases\ConexionBD;

$plazas = FuncionesBD::mostrarPlazas();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

</head>
<body class="container">
    <h1>Reserva del asiento</h1>
    <hr>
    <form action="reserva.php" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="Introduzca su nombre" required>
    <label for="DNI">DNI</label>
    <input type="text" id="DNI" name="DNI" placeholder="Su DNI" required>
    <label for="asiento">Asiento</label>
    <select name="asiento" id="asiento">
        <option value="1" disabled selected>Seleccione su asiento</option>
        <?php foreach($plazas as $plaza): ?>
        <option value=<?php echo $plaza['numero']?>><?php echo $plaza['numero'] .   ' ('.$plaza['precio'].'€)'?></option>
        <?php endforeach?>
    </select>
    <input type="submit" id="reservarBtn" name="reservarBtn" value="Reservar">
    </form>
    <?php  if (isset($_POST['reservarBtn']))
    {
        FuncionesBD::aniadirPasajero($_POST['DNI'],$_POST['nombre'],'-',$_POST['asiento']);
    } ?>
    
</body>
</html>