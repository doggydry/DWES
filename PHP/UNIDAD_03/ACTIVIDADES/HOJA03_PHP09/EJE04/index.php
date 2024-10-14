<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma de números</title>
</head>
<body>
    <h1>Suma de números</h1>

    <form action="" method="post">
        <?php
        // Generar dinámicamente 10 input boxes
        for ($i = 1; $i <= 10; $i++) {
            echo "<label for='num$i'>Cantidad $i: </label>";
            echo "<input type='number' id='num$i' name='numeros[]' value='$i'>";
            echo "<br><br>";
        }
        ?>
        <button type="submit" name="sumar">Sumar</button>
    </form>

    <?php
    // Lógica para procesar la suma
    if (isset($_POST['sumar'])) {
        // Verificamos si el array 'numeros' está presente
        if (!empty($_POST['numeros'])) {
            $numeros = $_POST['numeros'];
            $suma = array_sum($numeros);

            // Mostrar el resultado
            echo "<h2>La suma de los números es: $suma</h2>";
        } else {
            echo "<p>No se recibieron números para sumar.</p>";
        }
    }
    ?>
</body>
</html>
