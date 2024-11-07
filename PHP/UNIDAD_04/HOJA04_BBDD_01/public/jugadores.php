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
    <main class="container">
        <?php
        $equipos = FuncionesBD::getEquipos();
        ?>
        <form action="jugadores.php" method="post">
            <label for="equipo">Equipos</label>
            <select name="equipo" id="equipo">
                <?php foreach ($equipos as $nombre_equipo): ?>
                    <option value=<?php echo $nombre_equipo ?>> <?php echo $nombre_equipo ?> </option>
                <?php endforeach  ?>
            </select>
            <input type="submit" name="Jugadores">
        </form>
        <?php if (isset($_POST['equipo'])):
            $jugadores = FuncionesBD::getJugadores($_POST['equipo']);
        ?>
            <ul>
                <?php foreach ($jugadores as $jugador): ?>
                    <li><?php echo $jugador ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>

    </main>
</body>

</html>