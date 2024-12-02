<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Funicular\Class\PDOUsuario;
use Funicular\Class\Usuario;
use Funicular\Models\UsuarioModel;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena_usuario'];
    $contrasena_repetida = $_POST['contrasena_repetida'];

    if ($contrasena !== $contrasena_repetida) {
        header('Location: registro.php?error=2');
        exit;
    }

    $registro = new UsuarioModel();

    $registro->setNombre($nombre);
    $registro->setContrasena($contrasena);

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
