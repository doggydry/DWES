<?php

namespace Funicular\DB;

use Dotenv\Dotenv;
use PDO;
use PDOException;

final class Conexion
{

    private static ?PDO $conexion = null;


    private static function loadEnv(): void
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
            self::loadEnv();
            $dsn = self::getDSN();
            $username = self::getUsername();
            $password = self::getPassword();

            try {
                self::$conexion = new PDO($dsn, $username, $password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
            } catch (PDOException $pdo_e) {
                //TODO: crear la clase gestora de los errores y excepciones
            }
        }
        return self::$conexion;
    }
}
