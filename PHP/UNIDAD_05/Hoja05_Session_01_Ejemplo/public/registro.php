<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funicular</title>
</head>

<body>

    <header>
        <h1>Registro de Usuarios</h1>
    </header>
    <main>

        <form action="registro_gestion.php" method="post">
            <div><span>Nombre:</span> <input type="text" name="nombre_usuario"></div>
            <div><span>Contraseña:</span> <input type="password" name="contrasena_usuario"></div>
            <div><span>Repetir Contraseña:</span> <input type="password" name="contrasena_repetida"></div>
            <input type="submit" value="Registrarse">
        </form>
    </main>

</body>

</html>