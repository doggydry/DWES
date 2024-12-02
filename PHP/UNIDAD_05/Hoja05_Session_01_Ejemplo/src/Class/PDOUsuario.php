<?php

namespace Funicular\Class;

use Funicular\DB\Conexion;
use Funicular\Interfaces\IUsuario;
use Funicular\Models\UsuarioModel;
use PDO;
use PDOException;

class PDOUsuario implements IUsuario
{

    public function registrar(UsuarioModel $usuario): bool
    {
        $registrado = false;
        try {
            $conexion = Conexion::getConexion();

            $query = "INSERT INTO usuarios (nombre,contrasena) VALUES(:nombre,:contrasena)";

            $stmt = $conexion->prepare($query);
            $nombre_usuario = $usuario->getNombre();
            $contrasena_usuario = password_hash($usuario->getContrasena(), PASSWORD_BCRYPT);

            $stmt->bindParam(':nombre', $nombre_usuario);
            $stmt->bindParam(':contrasena', $contrasena_usuario);

            if ($stmt->execute()) {
                var_dump($stmt->rowCount());
                $registrado = $stmt->rowCount() === 1;
            }
        } catch (PDOException $pdo_e) {
        }

        return $registrado;
    }

    public function loguearse(UsuarioModel $usuario): bool
    {

        $logueo = false;

        try {

            $conexion = Conexion::getConexion();
            $nombre = $usuario->getNombre();
            $query = "SELECT nombre,contrasena FROM usuarios WHERE nombre='{$nombre}'";

            $stmt = $conexion->query($query);

            if ($stmt->rowCount() === 1) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, UsuarioModel::class);
                $usuarioBD = $stmt->fetch();
                $logueo = password_verify($usuario->getContrasena(), $usuarioBD->getContrasena());
            }
        } catch (PDOException $pdo_e) {
        }

        return $logueo;
    }
}
