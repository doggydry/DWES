<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Liga\Clases\ConexionBD;
// Obtener la conexión
$conexion = ConexionBD::getConexion();

if ($conexion) {
    echo "Conexión exitosa a la base de datos.<br/>";
} else {
    echo "Error al conectar a la base de datos.";
}
