<?php

namespace Funicular\Clases;

use Dotenv\Dotenv;
use Exception;
use PDO;
use PDOException;

class FuncionesBD
{

    public static function llegadaFunicular()
    {
        $conexion = ConexionBD::getConexion();
        if ($conexion instanceof PDO) {
            try {
                $conexion->beginTransaction();

                $queryPasajeros = "DELETE FROM pasajeros";
                $conexion->exec($queryPasajeros);

                $queryPlazas = "UPDATE plazas SET reservada = 0";
                $conexion->exec($queryPlazas);

                $conexion->commit();
                echo "Operacion realizada con éxito";
            } catch (PDOException $e) {
                $conexion->rollBack();
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public static function mostrarPlazas(): array
    {
        $conexion = ConexionBD::getConexion();
        $plazas = [];

        try {
            $query = "SELECT numero, precio FROM plazas";
            $stmt = $conexion->query($query);

            $plazas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Eror en la constulta" . $e->getMessage();
        }
        return $plazas;
    }

    public static function aniadirPasajero($dni, $nombre, $sexo, $numero_plaza)
    {
        $conexion = ConexionBD::getConexion();

        try {
            // Establecer el modo de error de PDO a excepción
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Iniciar una transacción para asegurar la integridad de los datos
            $conexion->beginTransaction();

            // 1. Verificar si la plaza está disponible
            $queryPlaza = "SELECT reservada FROM plazas WHERE numero =:numero_plaza";
            $stmt = $conexion->prepare($queryPlaza);
            $stmt->bindParam(':numero_plaza', $numero_plaza, PDO::PARAM_INT);
            $stmt->execute();
            $reservada = $stmt->fetchColumn();

            // Si la plaza está ocupada, lanzamos una excepción
            if ($reservada == 1) {
                throw new Exception("La plaza ya está ocupada.");
            }

            // 2. Insertar el nuevo pasajero en la base de datos
            $queryInsert = "INSERT INTO pasajeros (dni, nombre, sexo, numero_plaza) VALUES (:dni, :nombre, :sexo, :numero_plaza)";
            $stmt = $conexion->prepare($queryInsert);
            $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
            $stmt->bindParam(':numero_plaza', $numero_plaza, PDO::PARAM_INT);
            $stmt->execute();

            // 3. Marcar la plaza como reservada
            $queryUpdatePlaza = "UPDATE plazas SET reservada = 1 WHERE numero=:numero_plaza";
            $stmt = $conexion->prepare($queryUpdatePlaza);
            $stmt->bindParam(':numero_plaza', $numero_plaza, PDO::PARAM_INT);
            $stmt->execute();

            // Confirmar la transacción
            $conexion->commit();

            echo "Pasajero añadido con éxito.";
        } catch (Exception $e) {
            // Si ocurre algún error, deshacer la transacción
            $conexion->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }
    public static function actualizarPrecios($precios)
    {
        $conexion = ConexionBD::getConexion();

        try {

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->beginTransaction();
            foreach ($precios as $numero_plaza => $precio) {
   
                if ($precio <= 0) {
                    throw new Exception("El precio para la plaza {$numero_plaza} no es válido.");
                }
                $preciop = (float)$precio;
       
                $queryUpdate = "UPDATE plazas SET precio = :precio WHERE numero = :numero_plaza";
                $stmt = $conexion->prepare($queryUpdate);
                $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
                $stmt->bindParam(':numero_plaza', $numero_plaza, PDO::PARAM_INT);
                $stmt->execute();
            }

            $conexion->commit();
            echo "Precios actualizados con éxito.";
        } catch (Exception $e) {
            if ($conexion->inTransaction()) {
                $conexion->rollBack();
            }
            echo "Error: " . $e->getMessage();
        }
    }
}
