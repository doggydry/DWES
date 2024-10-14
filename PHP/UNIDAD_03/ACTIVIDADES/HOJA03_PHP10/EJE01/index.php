<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $coches = [
        "Mercedes" => ["Corolla", "Camry", "Prius"],
        "Ford" => ["Fiesta", "Focus", "Mustang"],
        "BMW" => ["Serie 3", "Serie 5", "X5"]
    ];

    $marcaSeleccionada = isset($_POST['marcas']) ? $_POST['marcas'] : '';

    function generarComboMarcas($coches, $marcaSeleccionada)
    {
        foreach ($coches as $marca => $modelos) {
            $selected = ($marca === $marcaSeleccionada) ? 'selected' : '';
            echo "<option value='$marca'  $selected>$marca</option>";
        }
    }
    if (isset($_POST['mostrar']) && !empty($marcaSeleccionada)) {

        echo "<h2>Modelos de $marcaSeleccionada</h2>";

        // Crear la tabla con los modelos
        echo "<form method='POST' action='mostrarModelos.php'>";
        echo "<input type='hidden' name='marca' value='$marcaSeleccionada'>";  // Mantener la marca seleccionada
        echo "<table>";
        echo "<tr><th>Modelo</th></tr>";

        foreach ($modelosSeleccionados as $index => $modelo) {
            $modeloModificado = isset($_POST['modelos'][$index]) ? $_POST['modelos'][$index] : $modelo;
            echo "<tr><td><input type='text' name='modelos[$index]' value='$modeloModificado'></td></tr>";
        }

        echo "</table>";
        echo "<input type='submit' name='mostrar' value='Actualizar'>";
        echo "</form>";
    }

    ?>
</body>

</html>