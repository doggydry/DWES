<?php
namespace SessionExamen\BD;

use Dotenv\Dotenv;

use PDO;
use PDOException;

final class Conexion
{
    private static ?PDO $conexion = null;
    private function __construct() {}
    private function __clone() {}



    private static function loadENV(): void
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();
    }

    private static function getDSN(): string
    {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $db_name = $_ENV['DB_NAME'];

        return "mysql:host={$host};port={$port};dbname={$db_name}";
    }

    private static function getUsername(): string
    {
        return $_ENV['DB_USERNAME'];
    }

    private static function getPassword(): string
    {
        return $_ENV['DB_PASSWORD'];
    }

    public static function getConexion(): ?PDO
    {
        if (!self::$conexion) {

            self::loadENV();
            $dsn = self::getDSN();
            $usuario = self::getUsername();
            $contrasena = self::getPassword();

            try {
                self::$conexion = new PDO($dsn, $usuario, $contrasena);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
            } catch (PDOException $pdo_e) {
                echo "Conexion::getConexion -> " . $pdo_e->getMessage();
            }
        }
        return self::$conexion;
    }
}
