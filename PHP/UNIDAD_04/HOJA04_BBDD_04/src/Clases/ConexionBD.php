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

    public static function getCategorias ():array{
        $categorias = [];
        $conexion = ConexionBD::getConexion();
        try {
            $query = 'SELECT id, nombre FROM categorias';
            $stmt = $conexion->query($query);
            while ($categoria=$stmt->fetch(PDO::FETCH_OBJ)){
                $categoria = new Categoria ($categoria->id, $categoria->nombre);
                $categorias[$categoria->getId()] = $categoria;
            }
        } catch(PDOException $e){

        }
        return $categorias;
    }
    public static function getProductos():array
    {
        $productos = [];
        $categorias = ConexionBD::getCategorias();
        $conexion = ConexionBD::getConexion();
        try {
            $query = 'SELECT productos.codigo, productos.nombre, precio, categoria_id, mesCaducidad, anioCaducidad,plazoGarantia FROM productos 
            LEFT JOIN alimentaciones on productos.codigo = alimentaciones.codigo 
            LEFT JOIN electronicas on  productos.codigo = electronicas.codigo';
            $stmt = $conexion->query($query);
             while ($producto=$stmt->fetch(PDO::FETCH_OBJ)){
                if ($producto->plazoGarantia){
                    $categoria = $categorias[$producto->categoria_id];
                    $producto = new Electronica($producto->codigo, $producto->precio, $producto->nombre, $categoria, $producto->plazoGarantia);
                    $productos[] = $producto;
                }else {
                    $categoria = $categorias[$producto->categoria_id];
                    $producto = new Alimentacion($producto->codigo, $producto->precio, $producto->nombre, $producto->mesCaducidad, $producto->anioCaducidad, $categoria);
                    $productos[] = $producto;
                }
             }

        } catch(PDOException $e){

        }
        return $productos;
        
    }

    
}
