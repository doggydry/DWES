<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Funicular\Models\UsuarioModel;
use Funicular\Class\PDOUsuario;
use Funicular\Class\Usuario;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funicular</title>
</head>

<body>

    <?php
    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
        enviarAutenticacion();
    }

    $nombre_usuario = $_SERVER['PHP_AUTH_USER'];
    $contrasena_usuario = $_SERVER['PHP_AUTH_PW'];

    // Crear un objeto UsuarioModel
    $usuario = new UsuarioModel();
    $usuario->setNombre($nombre_usuario);
    $usuario->setContrasena($contrasena_usuario);

    // Crear una instancia de PDOUsuario
    $usuarioService = new Usuario(new PDOUsuario());

    // Validar las credenciales
    if (!$usuarioService->loguearse($usuario)) {
        enviarAutenticacion();
    }

    function enviarAutenticacion()
    {
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        echo "Usuario no reconocido!";
    }
    ?>
    <h1>Hola <?php echo $nombre_usuario ?></h1>
</body>

</html>