<?php

namespace Vis\classes;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../helper.php';

use Vis\DB\ConexionBD;
use PDO;

class Autenticarse
{

    //* Metodo para iniciar la sesion, llamamos al helper->iniciar_sesion
    public static function inicializar()
    {
        return iniciar_sesion();
    }

    public static function configurar()
    {
        //*Creo la tabla en la base de datos si el usuario no existe
        $conexion = ConexionBD::getConexion();

        $query = "CREATE TABLE IF NOT EXISTS usuarios(
        id INT AUTO_INCREMENT PRIMARY KEY,
        correo VARCHAR(255) UNIQUE NOT NULL,
        clave VARCHAR(255) NOT NULL)";

        $conexion->exec($query);

        self::crearDatosUsuario();
    }

    public static function crearDatosUsuario()
    {
        $conexion = ConexionBD::getConexion();

        //* Primero comprobamos si el usuario existe
        $query = "SELECT COUNT(*) FROM USUARIOS WHERE correo = :correo";

        $stmt = $conexion->prepare($query);

        $stmt->execute(["correo" => "nestorAdmin@educantabria.es"]);
        //* Esto me devuelve una columan con el usuario si lo encuentra, si no lo encuentra me devolverá false
        $usuarioExiste = $stmt->fetchColumn();

        //*Si no lo encuentra que cree el usuario 
        if ($usuarioExiste == false) {
            $query = "INSERT INTO usuarios (correo,clave) VALUES (:correo, :clave)";
            $stmt = $conexion->prepare($query);
            $claveCifrada = password_hash('clave', PASSWORD_BCRYPT);
            $stmt->execute(['correo' => 'nestorAdmin@educantabria.es', 'clave' => $claveCifrada]);
        }
    }

    public static function autenticar()
    {

        if (!esPost()) {
            flash('ERROR', 'Metodo HTTP No permitido');
            redireccionar('index.php?action=paginaLogin');
            return;
        }

        if (estaLogueado()) {
            redireccionar('index.php?action=paginaLogin');
            exit;
        }

        //* Nos aseguramos de que siempre tengan valor con ?? '' (si no tiene valor se le asigna '');
        $correo = $_POST['correo'] ?? '';
        $clave = $_POST['clave'] ?? '';

        $conexion = ConexionBD::getConexion();
        $query = 'SELECT id, correo, clave FROM usuarios WHERE correo= :correo';
        $stmt = $conexion->prepare($query);
        $stmt->execute(['correo' => $correo]);
        $datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);

        //* Ahora verificamos si el correo existe y si la password conicide con la de la base de datos
        if ($datosUsuario && password_verify($clave, $datosUsuario['clave'])) {

            //*Creamos una instancia del usuario
            $usuario = new Usuarios((int)$datosUsuario['id'], $datosUsuario['correo'], $datosUsuario['clave']);

            //* Guradamos el usuario en la sesion
            $_SESSION['usuario'] = $usuario;

            redireccionar('index.php?action=paginaConectado');
        } else {
            flash('ERROR', 'Credenciales incorrectas');
            flash('correo', $correo);
            redireccionar('index.php?action=paginaLogin');
        }
    }

    public static function paginaConectado()
    {
        if (!estaLogueado()) {
            flash('ERROR', 'No tienes acceso a esta página');
            redireccionar('index.php?action=paginaLogin');
            return;
        }
        include __DIR__ .'/paginaConectado.php';
        return;
    }

    public static function paginaLogin()
    {
        if (estaLogueado()) {
            redireccionar('index.php?action=paginaConectado');
            return;
        } 
        include __DIR__ .'/paginaLogin.php';
    }

    public static function disconnect()
    {
        session_unset();
        session_destroy();
        redireccionar('index.php?action=paginaLogin');
    }


    public static function runAccion()
    {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            switch ($action) {
                case 'paginaLogin':
                    self::paginaLogin();
                    break;
                case 'paginaConectado':
                    self::paginaConectado();
                    break;
                case 'autenticar':
                    self::autenticar();
                    break;
                case 'desconectarse':
                    self::disconnect();
                    break;
                default:
                    redireccionar('index.php?action=paginaLogin');
            }
        }
    }
}
