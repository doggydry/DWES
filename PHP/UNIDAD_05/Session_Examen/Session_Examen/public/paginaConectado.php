<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

iniciar_sesion();

if (!$_SESSION['usuario']) {
    flash('error', 'No tienes acceso a esta pagina');
    redireccionar('index.php?accion=paginaLogin');
} else {
    $usuario = $_SESSION['usuario'];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Sesion_examen</title>
</head>

<body>

    <main class="container">
        <h1>Bienvenido</h1>
        <section>
            <p>Nombre de usuario es: <span><strong><?php echo $usuario->getUsuario() ?></strong></span></p>
            <a class="desconectarse" href="index.php?action=desconectarse">Cerrar sesion</a>
        </section>
    </main>

</body>

</html>