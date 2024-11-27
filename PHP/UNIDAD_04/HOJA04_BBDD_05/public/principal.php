<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use Hospital\Clases\ConexionBD;

$medicos = ConexionBD::getMedicos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Medicos</title>
</head>
<body class="container">
    <h1>Medicos del hospital</h1>
    <hr>
    <table>
        <tr>
        <td>Nombre</td>
        <td>Especialidad</td>
        <td>Turno</td>
        </tr>
        <?php foreach ($medicos as $medico):?> 
            <tr>
                <td><?php echo $medico->getNombre() ?></td>
            </tr>
            <?php endforeach;?>
    </table>
    <a href="turnos.php">Turnos</a>
    <a href="medicosFamilia.php">Medicos de Familia</a>
</body>
</html>