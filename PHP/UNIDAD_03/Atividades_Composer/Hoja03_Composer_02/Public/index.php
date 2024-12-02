<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Correo</title>
</head>

<body>
    <h1>Formulario de Envío de Correo</h1>
    <form action="Procesar.php" method="post">
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" required placeholder="Correo electrónico" id="email"><br><br>

        <label for="asunto">Asunto:</label>
        <input type="text" name="asunto" required placeholder="Asunto" id="asunto"><br><br>

        <label for="mensaje">Mensaje:</label><br>
        <textarea name="mensaje" required placeholder="Escribe tu mensaje aquí" id="mensaje"></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "El formulario fue enviado.";
    }
    ?>

</body>

</html>