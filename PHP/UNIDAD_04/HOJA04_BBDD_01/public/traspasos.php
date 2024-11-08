<?php
require_once dirname(__DIR__) . "/vendor/autoload.php";

use Liga\Clases\FuncionesBD;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
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
                <option value="1" disabled selected>Seleccione una opcion</option>
                <?php foreach ($equipos as $nombre_equipo): ?>
                    <option value=<?php echo $nombre_equipo ?> <?php  if (isset($_POST['equipo'])) echo $_POST['equipo']===$nombre_equipo ? 'selected' : '' ?>> <?php echo $nombre_equipo ?> </option>
                <?php endforeach  ?>
            </select>
            <input type="submit" name="mostrar" value="Mostrar">
        </form>

        <?php if (isset($_POST["equipo"])):
            $jugadores = FuncionesBD::getJugadores($_POST["equipo"]);
        ?>
            <h2>Baja y alta de jugadores</h2>
            <form action="traspasos.php" method="post">
                <input type="hidden" name="equipo" value=<?php echo $_POST['equipo']?>>
                <label for="Jugadores">Baja de jugador</label>
                <select name="jugadores" id="jugadores">
                    <?php foreach ($jugadores as $jugador): ?>
                        <option value=<?php echo $jugador ?>> <?php echo $jugador ?> </option>
                    <?php endforeach ?>
                </select>

                <h3>Datos del nuevo jugador</h3>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre">
                <br>
                <label for="procedencia">Procedencia</label>
                <input type="text" id="procedencia">
                <br>
                <label for="altura">Altura</label>
                <input type="text" id="altura" step="0.0" placeholder="0.00">
                <br>
                <label for="peso">Peso</label>
                <input type="number" id="peso" step="0.0" placeholder="0.00">
                <br>
                <label for="posicion">Posicion</label>
                <select>
                    <option>F-G</option>
                    <option>G-F</option>
                    <option>C</option>
                    <option>G</option>
                    <option>F</option>
                    <option>C-F</option>
                    <option>F-C</option>
                </select>
                <input type="submit" name="actualizar" value="Actualizar">
            </form>
        <?php endif ?>
    </body>
</main>

</html>