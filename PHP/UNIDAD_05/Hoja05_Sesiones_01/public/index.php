<?php 
require_once dirname(__DIR__) .'/vendor/autoload.php';

use Sesiones\Models\ModeloUsuario;
use Sesiones\clases\PDOUsuario;
use Sesiones\clases\Usuario;

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
    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])){
        enviarAutenticacion();
    }
    $nombre_usuario = $_SERVER['PHP_AUTH_USER'];
    $contrasenia_usuario = $_SERVER['PHP_AUTH_PW'];

    $usuario = new ModeloUsuario();
    $usuario->setNombre($nombre_usuario);
    $usuario->setContrasenia($contrasenia_usuario);

    $usuarioPDO = new Usuario(new PDOUsuario());

    if(!$usuarioPDO->loguearse($usuario)){
        enviarAutenticacion();
    }

    function enviarAutenticacion()
    {
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        echo "Usuario no reconocido!";
        exit;
    }
    ?>
    <h1><?php echo $nombre_usuario?></h1>
</body>
</html>