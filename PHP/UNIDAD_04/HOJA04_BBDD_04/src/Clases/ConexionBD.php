<?php

namespace Supermercado\Clases;

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
 /**
  * CAMBIARLO TODO PARA UTILIZAR LAS CLASES (USAR OBJETOS)
  */
    public static function mostrarProductos(): array
    {
        $conexion = ConexionBD::getConexion();
        $productos = [];

        if ($conexion instanceof PDO) {
            try {
                $query = "SELECT precio, nombre, categoria_id FROM productos";
                $stmt = $conexion->query($query);
                $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error en la consulta" . $e->getMessage();
            }
        }
        return $productos;
    }
    public static function mostrarCategoria(): array
    {
        $conexion = ConexionBD::getConexion();
        $categoria = [];
        if ($conexion instanceof PDO) {
            try {
                $query = "SELECT nombre FROM categorias";
                $stmt = $conexion->query($query);

                $categoria = $stmt->fetchAll(PDO::FETCH_COLUMN);
            } catch (PDOException $e) {
                echo "Error en la consulta" . $e->getMessage();
            }
        }
        return $categoria;
    }
    public static function mostrarProductosDeCategoria($categoria): array
    {
        $conexion = ConexionBD::getConexion();
        $productos = [];
    
        if ($conexion instanceof PDO) {
            try {
                // Usar una consulta preparada para evitar inyección SQL
                $query = "SELECT precio, nombre, categoria_id FROM productos WHERE nombre = :categoria";
                $stmt = $conexion->prepare($query);
                $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
                $stmt->execute();
    
                $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e->getMessage();
            }
        }
        return $productos;
    }
    
}
