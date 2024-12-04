<?php 
session_start();
$_SESSION['visitas'] = [];
$fechaActual = date("d-m-Y H:i:s");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Sesiones</title>
</head>
<body class="container">
    <h1>Gestionar Sesiones</h1>
    <hr>
    <h4>Nombre de usuario:</h4>
    <form action="sesiones.php" method="post">
        <input type="submit" name="Borrar Historial" value="Borrar Historial">
    </form>
</body>
</html>