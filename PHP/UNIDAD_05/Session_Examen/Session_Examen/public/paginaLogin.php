<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use SessionExamen\Service\Autenticar;
use SessionExamen\Modelos\UsuarioModelo;
use SessionExamen\Clases\Usuario;
use SessionExamen\Clases\PDOUsuario;

Autenticar::inicializar();

$error = flash('error') ?? '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Loguearse</title>
</head>

<body>

    <main class="container">
        <section class="login">
            <h1>Logueate</h1>
            <?php if ($error): ?>
                <div class="error">
                    <?php echo $error ?>
                </div>
            <?php endif ?>
            <form class="login-form" action="" method="POST">
                <div>
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" />
                </div>
                <div>
                    <label for="clave">Clave:</label>
                    <input type="password" id="clave" name="clave" />
                </div>
                <div>
                    <input type="submit" value="Loguearse" />
                </div>

            </form>
        </section>
    </main>

    <?php
    if (isset($_POST['usuario'])) {

        $usuario_registrado  = new UsuarioModelo(usuario: $_POST['usuario'], clave: $_POST['clave'], id: 0);

        $registro = new Usuario(new PDOUsuario());
        $registro->loguearse($usuario_registrado);
    }
    ?>

</body>

</html>