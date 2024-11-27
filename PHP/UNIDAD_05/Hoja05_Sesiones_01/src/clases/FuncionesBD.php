<?php
namespace Sesiones\clases;

use PDOException;
use PDO;

class FuncionesBD
{

    public static function aniadirUsuario()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $conexion = ConexionBD::getConexion();

            //Capturamos los datos del formulario
            $nombre = $_POST['nombre'];
            $contrasenia = $_POST['contrasenia'];
            $rep_contrasenia = $_POST['rep-contrasenia'];

            if ($contrasenia !== $rep_contrasenia) {
                echo 'Las contraseñas no coinciden';
                return;
            }
            try {
                // Hashing de la contraseña
                $hashedPassword = password_hash($contrasenia, PASSWORD_BCRYPT);

                // Almacenar el hash en la base de datos
                $stmt = $conexion->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
                $stmt->execute([$nombre, $hashedPassword]);

                echo "El usuario ha sido registrado correctamente";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public static function verificarUsuario($nombre, $contrasenia) {
        $conexion = ConexionBD::getConexion();

        try {
            // Buscar el hash de la contraseña en la base de datos
            $stmt = $conexion->prepare("SELECT password FROM usuarios WHERE username = ?");
            $stmt->execute([$nombre]);
            $hashedPassword = $stmt->fetchColumn();

            if ($hashedPassword && password_verify($contrasenia, $hashedPassword)) {
                echo "Contraseña correcta";
                return true; // El usuario ha sido autenticado
            } else {
                echo "Usuario o contraseña incorrectos";
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
