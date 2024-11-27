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
        $medicos = [];
        $turnos = ConexionBD::getTurnos();
        $conexion = ConexionBD::getConexion();
        try {
            $query = 'SELECT medicos.nombre, medicos.especialidad id, turno_id,descripcion, horario FROM medicos 
            LEFT JOIN turnos on turnos.id = medicos.turno_id';
            $stmt = $conexion->query($query);
            while ($medico=$stmt->fetch(PDO::FETCH_OBJ)){
                if ($medico->numPacientes){
                    $turno = $turnos[$medico->id];
                    $medico = new Urgencia($medico->codigo, $medico->nombre,$medico->edad, $turno, $medico->unidad);
                    $medicos [] = $medico;
                } else {
                    $turno = $turnos[$medico->id];
                    $medico = new Familia($medico->codigo, $medico->nombre,$medico->edad, $turno, $medico->numPacientes);
                    $medicos [] = $medico;
                }
            }
        } catch (PDOException $e) {
            echo 'Error en al consulta' . $e->getMessage();
        }
        return $medicos;
    }

    public static function getTurnos ():array{
        $turnos = [];
        $conexion = ConexionBD::getConexion();

        if ( $conexion instanceof PDO ) {
            try {
            $query = "SELECT descripcion, horario, id FROM turnos";
            $stmt = $conexion->query($query);
            while ($turno=$stmt->fetch(PDO::FETCH_OBJ)){
                $turno = new Turno ($turno->id, $turno->descripcion, $turno->horario);
                $turnos[$turno->getId()] = $turno;
            }
        } catch (PDOException $e) {
            echo "Error al realizar la consulta". $e->getMessage();
        }
    }
    return $turnos;
}
<<<<<<< HEAD
   
=======

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
>>>>>>> b7b243d4d7d6f24a4d4d8f92c3b71550944d95a2

}
