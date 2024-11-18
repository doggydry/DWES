<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use Hospital\Clases\ConexionBD;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body class="container">
    <h1>Turnos del hospital</h1>
    <?php
    $turnos = ConexionBD::getTurnos(); 
    ?>
    <form action="turnos.php" method="post">
        <label for="idTurno">Turnos</label>
        <select name="idTurno" id="idTurno">
            <option value="1" disabled select>Seleccione un turno</option>
            <?php foreach ($turnos as $turno): ?>
                <option value="<?php echo $turno ?> <?php if (isset($_POST['idTurno'])) echo $_POST['idTurno'] === $turno ? 'selected' : ''?>"> <?php echo $turno ?> </option>
                <?php endforeach ?>
        </select>
        <input type="submit" name="mostrar" value="Mostar Medicos">
    </form>
    
    <?php if (isset($_POST["idTurno"])): 
        $medicos = ConexionBD::mostrarMedicos($_POST["idTurno"]);
    ?>
    <h2>Medicos del turno</h2>
    <form action="turnos.php" method="post">
        <input type="hidden" name="idTurno" value=<?php echo $_POST['idTurno']?>>
        <label for="Medicos">Medicos del turno</label>
        <select name="medicos" id="medicos">
            <?php foreach($medicos as $medico): ?>
                <option value=<?php echo $medico ?>> <?php echo $medico ?> </option>
                <?php endforeach ?>
        </select>
    </form>
    <?php endif ?>
</body>
</html>