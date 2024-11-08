<?php

namespace Liga\Clases;

use PDO;
use PDOException;

class FuncionesBD
{

    public static function getEquipos(): array
    {
        $conexion = ConexionBD::getConexion();
        $equipos = [];

        if ($conexion instanceof PDO) {
            try {
                $query = "SELECT nombre FROM equipos"; // 
                $stmt = $conexion->query($query);

                $equipos = $stmt->fetchAll(PDO::FETCH_COLUMN);
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
            }
        }
        return $equipos;
    }

    public static function getJugadores(string $equipo): array
    {
        $conexion = ConexionBD::getConexion();
        $jugadores = [];

        if ($conexion instanceof PDO) {
            try {
                $query = "SELECT nombre,peso FROM jugadores WHERE nombre_equipo='{$equipo}'";
                $stmt = $conexion->query($query);

                $jugadores = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
            }
        }
        return  $jugadores;
    }
}
