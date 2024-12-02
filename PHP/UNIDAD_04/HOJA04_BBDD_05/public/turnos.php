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
        <label for="id">Turnos</label>
        <select name="id" id="id">
            <option value="1" disabled>Seleccione un turno</option>
            <?php foreach ($turnos as $turno): ?>
                <option value="<?php echo $turno->getId() ?>" <?php echo isset($_POST['id']) && $_POST['id'] == $turno->getId() ? 'selected' : '' ?>>
                    <?php echo $turno->getDescripcion() ?>
                </option>
            <?php endforeach ?>
        </select>
        <input type="submit" name="mostrar" value="Mostar Medicos">
    </form>

    <?php
    if (isset($_POST["id"])):
        $medicos = ConexionBD::getMedicos();
        $turno = $_POST['id'];
        //? Casteo para poder comparar con el id, ya que es un int y el valor del array de post['id'] un string
        $turnosSeleccionados = array_filter($medicos, function ($medico) use ($turno) {
            return $medico->getTurno()->getId() === (int)$turno;
        });
    ?>
        <h2>Medicos del turno</h2>
        <table>
            <tr>
                <td>Nombre</td>
                <td>Edad</td>
                <td>Especialidad</td>
            </tr>
            <?php foreach ($turnosSeleccionados as $medico): ?>
                <tr>
                    <td><?php echo $medico->getNombre() ?> </td>
                    <td><?php echo $medico->getEdad() ?> </td>
                    <td><?php echo $medico->getEspecialidad() ?> </td>
                </tr>
            <?php endforeach; ?>
        <?php endif ?>
</body>

</html>