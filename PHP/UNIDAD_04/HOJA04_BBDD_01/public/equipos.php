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

<body>
    <?php
    $equipos = FuncionesBD::getEquipos();

    foreach ($equipos as $nombre_equipo) {
        echo '<div>' . $nombre_equipo . '<div>';
    }
    ?>

</body>

</html>