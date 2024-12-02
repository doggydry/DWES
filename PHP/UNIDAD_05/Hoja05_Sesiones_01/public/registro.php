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

        <label for="rep_contrasenia"></label>
            <input type="password" name="rep_contrasenia" id="rep_contrasenia" placeholder="Repita su contraseña" required>
        <input type="submit" value="Registrar">
        </form>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['nombre']);
    $password = $_POST['contrasenia'];

    if (FuncionesBD::verificarUsuario($usuario, $password)) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        header('Location: PHP/UNIDAD_04/Hoja04_Bbdd_03/public/plazas.php');
        exit;
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>