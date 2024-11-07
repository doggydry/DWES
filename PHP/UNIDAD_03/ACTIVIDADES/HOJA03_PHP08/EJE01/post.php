<!DOCTYPE html>
<html> 
<head> 
	<title>Ejemplo Formularios</title> 
</head> 
<body>
    <!-- Añadimos el campo edad y observamos la URL-->
	<h1>Ejemplo de procesado de formularios</h1> 
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="nombre">Introduzca su nombre:</label>
		<input type="text" id="nombre" name="nombre">
		<br/> 
        <label for="edad">Introduzca su edad:</label>
		<input type="text" id="edad" name="edad1"><br/> 
        <label for="apellido">Introduzca sus apellidos:</label>
		<input type="text" id="apellido" name="apellidos"><br/> 
		<input type="submit" name="enviar" value="Enviar">
        <br/>
	</form>
</body> 
</html> 