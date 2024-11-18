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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

    <title>Plazas</title>
</head>

<body class="container">
    <h1>Gestion de plazas</h1>
    <hr>
    <form action="plazas.php" method="post">
        <?php foreach ($plazas as $plaza): ?>
            <label for="numero"><?php echo 'Plaza ' . $plaza['numero'] ?></label>
            <input type="number" id="precio_<?php echo $plaza['numero'];?>" name="precio[<?php echo $plaza['numero'];?>]" value="<?php echo $plaza['precio'];?>" step="any">
        <?php endforeach; ?>
        <input type="submit" name="actualizar" value="Actualizar">
    </form>
    <?php
    if (isset($_POST['actualizar'])) {
        // Verificar si los precios están disponibles en el formulario
        if (isset($_POST['precio']) && is_array($_POST['precio'])) {
            // Llamar a la función de actualización
            FuncionesBD::actualizarPrecios($_POST['precio']);
        } else {
            echo "No se enviaron precios válidos.";
        }
    }
    $plazas = FuncionesBD::mostrarPlazas();
    ?>

</body>

</html>