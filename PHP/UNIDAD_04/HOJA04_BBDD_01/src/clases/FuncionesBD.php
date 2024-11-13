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

                $jugadores = $stmt->fetchAll(PDO::FETCH_COLUMN);
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
            }
        }
        return  $jugadores;
    }

    /**S
     *! MODIFICAR ESTA FUNCION
     */
    public static function darBaja(array $jugadorData): array
    {
        $conexion = ConexionBD::getConexion();
        $jugadorDeBaja = [];
        if ($conexion instanceof PDO) {
            try {

                $query = 'INSERT INTO jugadores ( nombre, procedencia, altura, peso, posicion) 
                          VALUES (:nombre, :procedencia, :altura, :peso, :posicion)';


                $stmt = $conexion->prepare($query);

                $stmt->bindValue(':nombre', $jugadorData['nombre'], PDO::PARAM_STR);
                $stmt->bindValue(':procedencia', $jugadorData['procedencia'], PDO::PARAM_STR);
                $stmt->bindValue(':altura', $jugadorData['altura'], PDO::PARAM_INT);
                $stmt->bindValue(':peso', $jugadorData['peso'], PDO::PARAM_INT);
                $stmt->bindValue(':posicion', $jugadorData['posicion'], PDO::PARAM_STR);

                if ($stmt->execute()) {
                    $jugadorDeBaja['status'] = 'Jugador dado de baja correctamente';
                } else {
                    $jugadorDeBaja['status'] = 'Error al dar de baja al jugador';
                }
            } catch (PDOException $e) {
                $jugadorDeBaja['status'] = 'Error: ' . $e->getMessage();
            }
        }
        return $jugadorDeBaja;
    }
}
