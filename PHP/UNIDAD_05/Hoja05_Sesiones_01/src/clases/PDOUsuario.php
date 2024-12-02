<?php

namespace Sesiones\clases;

use Sesiones\Interfaces\IUsuario;
use Sesiones\Models;
use Sesiones\DB\ConexionBD;
use PDO;
use PDOException;
use Sesiones\Models\ModeloUsuario;

class PDOUsuario implements IUsuario
{

    public function registrar(ModeloUsuario $usuario): bool
    {
        $registrado = false;

        try {
            $conexion = ConexionBD::getConexion();

            $query = "INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)";

            $stmt = $conexion->prepare($query);
            $nombre_usuario = $usuario->getNombre();
            $contrasenia_usuario = password_hash($usuario->getContrasenia(), PASSWORD_BCRYPT);

            $stmt->bindParam(":usuario", $nombre_usuario, PDO::PARAM_STR);
            $stmt->bindParam(":password", $contrasenia_usuario);

            if ($stmt->execute()) {
                var_dump($stmt->rowCount());
                $regisrado = true;
            }else {
                $regisrado = false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $registrado;
    }

    public function loguearse(ModeloUsuario $usuario): bool
    {
        $logueo = false;

        try {
            $conexion = ConexionBD::getConexion();
            $nombre = $usuario->getNombre();

            $query = "SELECT usuario, password FROM usuarios WHERE nombre='{$nombre}";

            $stmt = $conexion->prepare($query);

            if ($stmt->rowCount() === 1) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, ModeloUsuario::class);
                $usuario = $stmt->fetch();
                $logueo = password_verify($usuario->getContrasenia(), $usuario->getNombre());
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $logueo;
    }
}
