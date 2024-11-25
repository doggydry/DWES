<?php

namespace Hospital\Clases;

use Dotenv\Dotenv;
use PDO;
use PDOException;

class ConexionBD
{
    private static $conexion = null;

    public static function getConexion()
    {
        if (self::$conexion === null) {

            $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
            $dotenv->load();

            $dsn = $_ENV['DB_DSN'] ?? '';
            $username = $_ENV['DB_USERNAME'] ?? '';
            $password = $_ENV['DB_PASSWORD'] ?? '';

            try {
                self::$conexion = new PDO($dsn, $username, $password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }
        }
        return self::$conexion;
    }

    public static function getMedicos(): array
    {
        $conexion = ConexionBD::getConexion();
        $medicos = [];

        try {
            $query = 'SELECT nombre, especialidad, turno_id FROM medicos';
            $stmt = $conexion->query($query);
            $medicos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error en al consulta' . $e->getMessage();
        }
        return $medicos;
    }

    public static function getTurnos ():array{
        $conexion = ConexionBD::getConexion();
        $turnos = [];

        if ( $conexion instanceof PDO ) {
            try {
            $query = "SELECT descripcion, horario, id FROM turnos";
            $stmt = $conexion->query($query);
            
            $turnos = $stmt->fetchAll(PDO::FETCH_COLUMN);    
        } catch (PDOException $e) {
            echo "Error al realizar la consulta". $e->getMessage();
        }
    }
    return $turnos;
}

    public static function mostrarMedicos(string $id): array {
        $conexion = ConexionBD::getConexion();
        $medicos = [];
        if ($conexion instanceof PDO) {
            try {
                $query = "SELECT nombre, especialidad FROM medicos WHERE turno_id = $id";
                $stmt = $conexion->query($query);

                $medicos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error en la consulta" . $e->getMessage();
            }
        }
        return $medicos;
    }

}
