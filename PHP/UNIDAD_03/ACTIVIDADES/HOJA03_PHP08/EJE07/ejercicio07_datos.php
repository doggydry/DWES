<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de los Pares de Números</title>
</head>

<body>
    <h1>Lista de Pares de Números</h1>

    <?php
    if (isset($_POST["numero"]) && isset($_POST["numero2"])) {
        // Recibir los números del formulario
        $numero = intval($_POST["numero"]);
        $numero2 = intval($_POST["numero2"]);

        // Verificar que el primer número sea menor que el segundo
        if ($numero < $numero2) {
            echo "<ul>";
            // Generar la lista de pares de números
             for($i=$numero, $j=$numero2; $i<=$numero2; $i++, $j--) {
                echo "<li>($i, $j) <li>";
                if ($j == $numero) {
                    break;
                }
            }
            echo "</ul>";
        }
         else {
            echo "<p>Error: El primer número debe ser menor que el segundo.</p>";
        }
    } else {
        echo "<p>Error: No se recibieron correctamente los números.</p>";
    }
    ?>
    <br>
    <a<form  action="ejercicio07.html" method="post">
    <button type="submit">Volver</button>
</body>

</html>
