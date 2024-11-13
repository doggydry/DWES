<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
    <main class="container">
        <form id="formLibrosGuardar" action="libros_guardar.php" method="post">
            <h1>Inserte los datos del libro </h1>
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo">
            <label for="anyo_edicion">Año de Edicion</label>
            <input type="number" id="anio" name="anyo_edicion">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio">
            <label for="fecha_adquisicion">Fecha de Adquisicion</label>
        <input type="date" id="fecha_adq" name="fecha_adquisicion">
        <input type="submit" id="guardarDatosBtn" value="Guardar datos del libro">
    </form>
        <hr>
        <h2>Mostrar informacion de todos los libros</h2>
        <form id="formLibrosDatos" action="libros_datos.php" method="post">
            <input type="submit" id="mostrarId" value="Mostrar">
        </form>
    </main>

</body>

</html>