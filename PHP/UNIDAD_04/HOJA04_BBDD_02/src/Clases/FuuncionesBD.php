<?php

namespace Libros\Clases;

use PDO;
use PDOException;

class FuuncionesBD{

    public static function getDatosLibros(): array
    {
        $conexion = ConexionBD::getConexion();

        if ($conexion instanceof PDO) {
            try {
                $query = "SELECT numero_ejemplar, titulo, anyo_edicion, precio, fecha_adquisicion FROM libros";

                $stmt = $conexion->prepare($query);
                $stmt->execute();

                $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $libros;
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
                return [];
            }
        }
    }

}