<?php
require '../vendor/autoload.php';

use Dotenv\Dotenv;

class ConexionBD
{
    private static $conexion = null;

    public static function getConexion()
    {
        if (self::$conexion === null) {
            $dotenv = Dotenv::createImmutable(dirname(__DIR__));
            $dotenv->load();

            $dns = $_ENV['BD_DNS'] ?? '';
            $username = $_ENV['BD_USERNAME'] ?? '';
            $password = $_ENV['BD_PASSWORD'] ?? '';

            try {
                self::$conexion = new PDO($dns, $username, $password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }
        }
        return self::$conexion;
    }
}

function guardarLibro($titulo, $ano_edicion, $precio, $fecha_adquisicion)
{
    $conexion = ConexionBD::getConexion();
    $sql = "INSERT INTO libros (titulo, ano_edicion, precio, fecha_adquisicion) VALUES (:titulo, :ano_edicion, :precio, :fecha_adquisicion)";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':ano_edicion', $ano_edicion);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':fecha_adquisicion', $fecha_adquisicion);
    
    return $stmt->execute();
}
?>
