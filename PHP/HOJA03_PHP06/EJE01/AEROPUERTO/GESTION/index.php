<?php
namespace AEROPUERTO\GESTION;

use AEROPUERTO\ELEMENTOS_VOLADORES\Avion;
use AEROPUERTO\ELEMENTOS_VOLADORES\Helicoptero;

require_once '../ELEMENTOS_VOLADORES/Avion.php'; // Ajuste en la ruta
require_once '../ELEMENTOS_VOLADORES/Helicoptero.php'; // Ajuste en la ruta
require_once 'Aeropuerto.php';
// Crear un nuevo aeropuerto
$aeropuerto = new Aeropuerto();

// Crear aviones y helicópteros
$avion1 = new Avion("Boeing 747", 2, 4, "Iberia", "2020-01-01", 12000);
$avion2 = new Avion("Airbus A320", 2, 2, "Vueling", "2021-02-15", 10000);
$avion3 = new Avion("Boeing 777", 2, 2, "American Airlines", "2019-07-30", 14000);

$helicoptero1 = new Helicoptero("Helicóptero 1", 0, 1, "Propietario A", 2);
$helicoptero2 = new Helicoptero("Helicóptero 2", 0, 1, "Propietario B", 4);
$helicoptero3 = new Helicoptero("Helicóptero 3", 0, 2, "Propietario C", 6);

// Insertar aviones y helicópteros en el aeropuerto
$aeropuerto->insertar($avion1);
$aeropuerto->insertar($avion2);
$aeropuerto->insertar($avion3);
$aeropuerto->insertar($helicoptero1);
$aeropuerto->insertar($helicoptero2);
$aeropuerto->insertar($helicoptero3);

// Probar el método buscar (busca por nombre)
echo "\nBuscando Boeing 747:\n";
$aeropuerto->buscar("Boeing 747");

echo "\nBuscando Helicóptero 1:\n";
$aeropuerto->buscar("Helicóptero 1");

echo "\nBuscando un aparato inexistente:\n";
$aeropuerto->buscar("Cessna");

// Probar el método listarCompania (busca por nombre de la compañía aérea)
echo "\nListando aviones de Iberia:\n";
$aeropuerto->listarCompania("Iberia");

echo "\nListando aviones de una compañía inexistente:\n";
$aeropuerto->listarCompania("Ryanair");

// Probar el método rotores (busca helicópteros por número de rotores)
echo "\nListando helicópteros con 2 rotores:\n";
$aeropuerto->rotores(2);

echo "\nListando helicópteros con 5 rotores (inexistente):\n";
$aeropuerto->rotores(5);

// Probar el método despegar (recibe nombre del aparato, altitud y velocidad)
echo "\nDespegando Boeing 747 a 5000 metros y 200 de velocidad:\n";
$aeropuerto->despegar("Boeing 747", 5000, 200);

// Comprobar si está volando
echo $avion1->volando() ? "El avión está volando.\n" : "El avión no está volando.\n";

// Probar el despegue de un helicóptero
echo "\nDespegando Helicóptero 1 a 300 metros y 100 de velocidad:\n";
$aeropuerto->despegar("Helicóptero 1", 300, 100);

// Comprobar si está volando
echo $helicoptero1->volando() ? "El helicóptero está volando.\n" : "El helicóptero no está volando.\n";

?>
