<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use Liga\Clases\FuncionesBD;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body class = container>
    <?php
    $jugadores = FuncionesBD::getEquipos();
    ?>
    <ul>
        <?php foreach ($jugadores as $jugador): ?>
            <li><?php echo $jugador ?></li>
        <?php endforeach ?>
    </ul>

</body>

</html>