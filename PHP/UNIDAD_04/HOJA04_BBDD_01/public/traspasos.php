<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use Liga\Clases\FuncionesBD;
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
<title>Traspasos</title>
</head>
<main class="container">

    <body>
        <h1>Traspasos de Jugadores</h1>
        <?php
        $equipos = FuncionesBD::getEquipos();
        ?>
        <form action="traspasos.php" method="post">
            <label for="equipo">Equipos</label>
            <select name="equipo" id="equipo">
                <?php foreach ($equipos as $nombre_equipo): ?>
                    <option value=<?php echo $nombre_equipo ?>> <?php echo $nombre_equipo ?> </option>
                <?php endforeach  ?>
            </select>
            <input type="submit" name="mostrar" value="Mostrar">
        </form>

        
        <h2>Baja y alta de jugadores</h2>
        <?php if (isset($_POST["equipo"])):
            $jugadores = FuncionesBD::getJugadores($_POST["equipo"]);
        ?>
            <form action="traspasos.php" method="post">
                <label for="Jugadores"></label>
                <select name="jugadores" id="jugadores">
                    <?php foreach ($jugadores as $jugador): ?>
                        <li><?php echo $jugador ?></li>
                    <?php endforeach ?>
                <?php endif ?>
            </form>
    </body>
</main>

</html>