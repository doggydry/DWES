<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Sesiones\clases\PDOUsuario;
use Sesiones\clases\Usuario;
use Sesiones\Models\ModeloUsuario;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre_usuario'];
    $contrasenia = $_POST['contrasenia_usuario'];
    $contrasenia_repetida = $_POST['contrasenia_repetida'];

    if ($contrasenia !== $contrasenia_repetida) {
        header('Location: registro.php?error=2');
        exit;
    }

    $registro = new ModeloUsuario();

    $registro->setNombre($nombre);
    $registro->setContrasenia($contrasenia);

    $usuario = new Usuario(new PDOUsuario());

    if ($usuario->registrar($registro)) {
        header('Location: index.php');
        exit;
    } else {
        header('Location: registro.php?error=3');
        exit;
    }
} else {
    header('Location: registro.php?error=1');
    exit;
}
