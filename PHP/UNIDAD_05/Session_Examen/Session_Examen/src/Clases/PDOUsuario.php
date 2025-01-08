<?php

namespace SessionExamen\Clases;

use PDO;
use PDOException;
use SessionExamen\Interfaz\IUsuario;
use SessionExamen\BD\Conexion;
use SessionExamen\Modelos\UsuarioModelo;

class PDOUsuario implements IUsuario
{

    private PDO $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getConexion();
    }


    public function registrarse(UsuarioModelo $usuario): void
    {
        if (!esPost()) {
            flash('error', 'Metodo HTTP no permitido');
            redireccionar('index.php?action=paginaLogin');
        }

        try {
            $query = 'INSERT INTO usuarios(usuario,clave) VALUES(:usuario,:clave)';
            $stmt = $this->conexion->prepare($query);

            $params =
                [
                    ':usuario' => $usuario->getUsuario(),
                    ':clave' => password_hash($usuario->getClave(),PASSWORD_BCRYPT),
                ];

            $resultado = $stmt->execute($params);

            if ($resultado) {
                redireccionar("index.php?action=paginaLogin");
            } else {
                flash("error", "No establecio correctamente al usuario");
                redireccionar("index.php?action=paginaRegister");
            }
        } catch (PDOException $pdo_e) {
            echo "PDOUsuario->registrarse -> " . $pdo_e->getMessage();
        }
    }

    public function loguearse(UsuarioModelo $usuario): void
    {

        if (!esPost()) {
            flash('error', 'Metodo HTTP no permitido');
            redireccionar('index.php?action=paginaLogin');
        }

        try {
            $query = 'SELECT id,usuario,clave FROM usuarios WHERE usuario = :usuario';
            $stmt = $this->conexion->prepare($query);
            $params = [':usuario' => $usuario->getUsuario()];

            if ($stmt->execute($params)) {
                $valores = $stmt->fetch(PDO::FETCH_OBJ);
                $usuarioBD = new UsuarioModelo($valores->id, $valores->usuario, $valores->clave);

                $contrasena = $usuario->getClave();
                $resultado = password_verify($contrasena, $usuarioBD->getClave());

                if ($resultado) {
                    $_SESSION['usuario'] = $usuarioBD;
                    redireccionar("index.php?action=paginaConectado");
                } else {
                    flash("error", "Usuario y/o contraseñas no validas");
                    redireccionar("index.php?action=paginaLogin");
                }
            }
        } catch (PDOException $pdo_e) {
            echo "PDOUsuario->loguearse -> " . $pdo_e->getMessage();
        }
    }

    public function borrar(UsuarioModelo $usuario): void
    {
        try {
            $query = "DELETE FROM usuarios WHERE id = :id";

            $stmt = $this->conexion->prepare($query);
            $params = [':id' => $usuario->getId()];

            $resultado = $stmt->execute($params);

            if($resultado){
                session_destroy();
                redireccionar("index.php?action=paginaLogin");
            }else{
                flash("error", "No se pudo borra al usuario");
                redireccionar("index.php?action=paginaConectado");
            }
        } catch (PDOException $pdo_e) {
            echo "PDOUsuario->borrar -> " . $pdo_e->getMessage();
        }
    }
}
