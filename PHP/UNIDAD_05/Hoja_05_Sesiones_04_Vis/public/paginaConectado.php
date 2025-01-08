<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__).'/helper.php';


iniciar_sesion();

if (!estaLogueado()) {
    flash('ERROR', 'No tienes acceso a esta página');
    redireccionar('index.php?action=paginaLogin');
    return;
}
$_SESSION['usuario'] = $usuario;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.5.6/css/pico.min.css">
    <title>Conectado</title>
</head>

<body class="container">
    <article>
        <div>
            <h1>Te has conectado</h1>
            <p>Tu id de usuario es</span><?php echo $usuario['id'];?></p>
            <form action="index.php?action=desconectarse" method="POST">
                <button type="submit">Cerrar Sesión</button>
            </form>
        </div>
    </article>
</body>

</html>