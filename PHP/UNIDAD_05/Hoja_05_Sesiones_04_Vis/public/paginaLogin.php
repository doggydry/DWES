<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__).'/helper.php';

iniciar_sesion();

if (estaLogueado()) {
    redireccionar('index.php?action=paginaConectado');
    return;
} 

$error = flash('error');
$correo = flash('correo');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.5.6/css/pico.min.css">

    <title>Login</title>
</head>

<body class="container">
    <article>
        <h1>Inicio de sesión</h1>
        <form class=" login-form" action="index.php?action=autenticar" method="POST">
            <label for="correo">Correo Electronico:</label>
            <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" required>

            <label for="clave">Contraseña:</label>
            <input type="password" id="clave" name="clave" required>

            <button type="submit">Iniciar sesión</button>

            <?php if ($error): ?>
                <div style="color: red;">
                    <p><?php echo $error ?></p>
                </div>
            <?php endif ?>
        </form>
    </article>
</body>

</html>