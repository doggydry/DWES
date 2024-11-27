<?php

require_once dirname(__DIR__) . "../vendor/autoload.php";
use Sesiones\clases\FuncionesBD;
use Sesiones\clases\ConexionBD;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Registrate</title>
</head>
<body class="container">
    <h1>Registro de usuarios</h1>
        <form method="POST" action="registro.php">
        <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Su nombre" required>         

        <label for="contrasenia">Contraseña</label>
            <input type="password" name="contrasenia" id="contrasenia" placeholder="Su contraseña" required>

        <label for="rep-contrasenia"></label>
            <input type="password" name="rep-contrasenia" id="rep-contrasenia" placeholder="Repita su contraseña" required>
        <input type="submit" value="Registrar">
        </form>
</body>
</html>

<?php
// Código para iniciar sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $contrasenia = $_POST['contrasenia'];

    if (FuncionesBD::verificarUsuario($nombre, $contrasenia)) {
        echo "Acceso permitido";
        // Aquí puedes redirigir a la página protegida
    } else {
        echo "Acceso denegado";
    }
}
?>
