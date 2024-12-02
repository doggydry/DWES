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
            $query = 'SELECT medicos.id, medicos.nombre, medicos.edad, medicos.id, medicos.turno_id, 
                 turnos.descripcion, turnos.horario, familia.numPacientes, urgencias.unidad 
          FROM medicos
          LEFT JOIN turnos ON turnos.id = medicos.turno_id
          LEFT JOIN familia ON familia.medico_id = medicos.id
          LEFT JOIN urgencias ON urgencias.medico_id = medicos.id';
            $stmt = $conexion->query($query);
            while ($medico = $stmt->fetch(PDO::FETCH_OBJ)) {
                if ($medico->unidad) {
                    $turno = $turnos[$medico->turno_id];
                    $medico = new Urgencia($medico->id, $medico->nombre, $medico->edad, $turno, $medico->unidad);
                    $medicos[] = $medico;
                } else {
                    $turno = $turnos[$medico->turno_id];
                    $medico = new Familia($medico->id, $medico->nombre, $medico->edad, $turno, $medico->numPacientes);
                    $medicos[] = $medico;
                }
            }
        } catch (PDOException $e) {
            echo 'Error en al consulta' . $e->getMessage();
        }
        return $medicos;
    }

    public static function getTurnos(): array
    {
        $turnos = [];
        $conexion = ConexionBD::getConexion();

        if ($conexion instanceof PDO) {
            try {
                $query = "SELECT descripcion, horario, id FROM turnos";
                $stmt = $conexion->query($query);
                while ($turno = $stmt->fetch(PDO::FETCH_OBJ)) {
                    $turno = new Turno($turno->id, $turno->descripcion, $turno->horario);
                    $turnos[$turno->getId()] = $turno;
                }
            } catch (PDOException $e) {
                echo "Error al realizar la consulta" . $e->getMessage();
            }
        }
        return $turnos;
    }

    public static function buscarNumPacientes($num_Pacientes): array
    {
        $medicos = [];
        $conexion = ConexionBD::getConexion();

        try {
            $query = "
        SELECT m.id, m.nombre, m.edad, f.numPacientes, t.descripcion, t.horario
        FROM medicos m
        JOIN familia f ON m.id = f.medico_id
        JOIN turnos t ON m.id = t.id
        WHERE f.numPacientes >= :num_Pacientes;

";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':num_Pacientes', $num_Pacientes, PDO::PARAM_INT);
            //? hay que usar execute ya que estamos usando una prepare($query)
            $stmt->execute();  
            while ($medico = $stmt->fetch(PDO::FETCH_OBJ)) {
                $turno = new Turno($medico->id, $medico->descripcion, $medico->horario);
                $medico = new Familia($medico->id, $medico->nombre, $medico->edad, $turno, $medico->numPacientes);
                $medicos[$medico->getId()] = $medico;
            }
        } catch (PDOException $e) {
            echo "Error al realizar la consulta" . $e->getMessage();
        }
        return $medicos;
    }
}
