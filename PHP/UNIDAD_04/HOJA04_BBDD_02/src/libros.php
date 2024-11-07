
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Inserte los datos del libro</h1>
    <form action="libros_guardar.php" method="post">
        <label for="titulo">Título <span style="color: red;">*</span>:</label>
        <input type="text" id="titulo" name="titulo" required>
        
        <label for="ano_edicion">Año de edición <span style="color: red;">*</span>:</label>
        <input type="number" id="ano_edicion" name="ano_edicion" min="1" required>
        
        <label for="precio">Precio <span style="color: red;">*</span>:</label>
        <input type="number" step="0.01" id="precio" name="precio" min="0" required>
        
        <label for="fecha_adquisicion">Fecha de adquisición (dd/mm/aaaa) <span style="color: red;">*</span>:</label>
        <input type="text" id="fecha_adquisicion" name="fecha_adquisicion" required>
        
        <button type="submit">Guardar datos del libro</button>
    </form>

    <a href="libros_datos.php">Mostrar los libros guardados</a>
</body>
</html>
