<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'Medico.php'; 

/** 
 * Creamos un array para almacenar los objetos de tipo Medico 
*/ 
$medicos = [];

/** 
 * Creamos objetos de médicos de familia 
 */
$medicos[] = new Familia("Juan Pérez", 45, "mañana", 20);
$medicos[] = new Familia("Ana García", 55, "tarde", 25);
$medicos[] = new Familia("Luis Martínez", 70, "mañana", 15);

/** 
 * Creamos objetos de médicos de urgencias
 */
$medicos[] = new Urgencia("Pedro Gómez", 65, "tarde", "Urgencias Generales");
$medicos[] = new Urgencia("Laura López", 50, "mañana", "Urgencias Pediátricas");
$medicos[] = new Urgencia("Carlos Ruiz", 62, "tarde", "Urgencias Cardiacas");

/**
 * Mostramos todos los datos de los médicos
 */
echo "DATOS DE LOS MÉDICOS<br>";
foreach ($medicos as $medico) {
    echo $medico->getInfo() . "<br>";
}

/** Aqui se cuenta los médicos 
 * de turno de tarde de urgencias mayores de 60 años 
 */ 
$contadorUrgenciasTarde = 0;
foreach ($medicos as $medico) {
    if ($medico instanceof Urgencia && $medico->getTurno() === "tarde" && $medico->getEdad() > 60) {
        $contadorUrgenciasTarde++;
    }
}
echo "NUMERO DE MEDICOS DE URGENCIA DE TURNOS DE TARTDE MAYORES DE 60 AÑOS: $contadorUrgenciasTarde<br>";

/**
 *  Aquí mostramos médicos de familia con un número de 
 *  pacientes igual o superior a un número dado
 * (numPacientesMinimos)
 */ 
$numPacientesMinimos = 20; 
echo "MÉDICOS DE FAMILIA CON IGUAL O SUPERIOR Nº DE PACIENTES -> ($numPacientesMinimos):<br>";
foreach ($medicos as $medico) {
    if ($medico instanceof Familia && $medico->getNumPacientes() >= $numPacientesMinimos) {
        echo $medico->getInfo() . "<br>";
    }
}
?>

</body>
</html>
