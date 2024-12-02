<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use Hospital\Clases\ConexionBD;

//? inicializos medicos como un array vacio para evitar errores y asegurarnos que siempre tenga un valor
$medicos = [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicos Familia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body class="container">
<h1>Medicos Familia</h1>
<hr>
<form action="medicosFamilia.php" method="post">
    <label for="num_Pacientes">Introduzca el numero de pacientes</label>
    <input type="text" id="num_Pacientes" name="num_Pacientes" required>
    <input type="submit" value="Buscar">
</form>

<?php 
//? Si $_POST['num_Pacientes'] existe y no está vacio, inicializamos la variable medico
if (isset($_POST['num_Pacientes']) && !empty($_POST['num_Pacientes'])){
    $medicos = ConexionBD::buscarNumPacientes($_POST['num_Pacientes']);
} 
?>
<h2>Medicos de familia encontrados</h2>
<table>
            <tr>
                <td>Nombre</td>
                <td>Edad</td>
                <td>Unidad</td>
                <td>Numero de Pacientes</td>
            </tr>
            <?php foreach ($medicos as $medico): ?>
                <tr>
                    <td><?php echo $medico->getNombre() ?> </td>
                    <td><?php echo $medico->getEdad() ?> </td>
                    <td><?php echo $medico->getEspecialidad() ?> </td>
                    <td><?php echo $medico->getnumPacientes() ?> </td>
                </tr>
            <?php endforeach; ?>
</body>

</html>