<?php
require_once dirname(__DIR__) . 'vendor/autoload.php';
require_once dirname(__DIR__) . 'helper.php';


iniciar_sesion();

/**
 ** Comprobar si el usuario esta logueado, si no lo está mostrar el error
 ** y redirigir a la página de login
 */
if (!estaLogueado()) {
    flash('error', 'No tienes acceso a esta pagina');
    redireccionar('index.php?action=paginaLogin');
    exit;
}

//* Si está logueado, obtener la info del usuario
$usuario_ID = $_SESSION['usuario_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css" rel="stylesheet">

    <title>Conectado</title>
</head>
<body class="container">
    <div>
        <h1>Te has conectado</h1>
        <p>Tu id de usuario es <?php echo htmlspecialchars($usuario_id);?></p>
        <form action="index.php?action=desconectarse" method="POST">
            <button type="submit">Cerrar Sesión</button>
        </form>
    </div>
    
</body>
</html>