<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Clases\FuncionesBD;

$funcionesBD = new FuncionesBD();

// Prueba de obtener jugadores
echo "Lista de Jugadores:\n";
$jugadores = $funcionesBD->obtenerJugadores();
print_r($jugadores);

// Prueba de obtener equipos
echo "Lista de Equipos:\n";
$equipos = $funcionesBD->obtenerEquipos();
print_r($equipos);

// Prueba de insertar un jugador
$nombre = "Michael Jordan";
$equipo_id = 1; // Suponiendo que el equipo con ID 1 existe en la tabla
$posicion = "Escolta";
$altura = 198;
$peso = 98;

if ($funcionesBD->insertarJugador($nombre, $equipo_id, $posicion, $altura, $peso)) {
    echo "Jugador insertado correctamente.\n";
} else {
    echo "Error al insertar el jugador.\n";
}

// Prueba de actualizar estadísticas de un jugador
$jugador_id = 1; // Suponiendo que el jugador con ID 1 existe en la tabla
$puntos = 30;
$asistencias = 5;
$rebotes = 6;

if ($funcionesBD->actualizarEstadisticasJugador($jugador_id, $puntos, $asistencias, $rebotes)) {
    echo "Estadísticas del jugador actualizadas correctamente.\n";
} else {
    echo "Error al actualizar las estadísticas del jugador.\n";
}
