<?php
require_once dirname(__DIR__).'/vendor/autoload.php';
require_once dirname(__DIR__).'/helper.php';

use App\classes\Autenticarse;


//* Iniciar sesion si no está iniciada
iniciar_sesion();

//* Si está logueado redirigir a la página de conectado
if (estaLogueado()){
    header("Location: index.php?action=paginaConectado");
    exit;
}

$error = flash('error');
$correo = flash('correo');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body class="container">
    <h1>Inicio de sesión</h1>

    <!-- Mostrar el mensaje de error si existe -->
    <?php if($error):?>
        <div style="color: red;">
            <p><?php echo $error; ?></p>
        </div>
    <?php endif;?>

    <form action="index.php?action=autenticar" method="POST">
        <label for="correo">Correo Electronico:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $correo;?>" reqiored>

        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" required>

        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
