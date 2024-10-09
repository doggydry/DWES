<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Creación del array de artículos
$articulos = [
    ["codigo" => "A001", "descripcion" => "Portatil", "existencias" => 10],
    ["codigo" => "A002", "descripcion" => "Bolsas", "existencias" => 50],
    ["codigo" => "A003", "descripcion" => "Ruedas", "existencias" => 30],
];

// Función para encontrar el artículo con mayor número de existencias
function mayor($articulos) {
    $mayorExistencia = 0;
    $articuloMayor = null;

    foreach ($articulos as $articulo) {
        if ($articulo["existencias"] > $mayorExistencia) {
            $mayorExistencia = $articulo["existencias"];
            $articuloMayor = $articulo["descripcion"];
        }
    }

    return $articuloMayor;
}

// Función para sumar todas las existencias
function sumar($articulos) {
    $totalExistencias = 0;

    foreach ($articulos as $articulo) {
        $totalExistencias += $articulo["existencias"];
    }

    return $totalExistencias;
}

// Método para mostrar el contenido del array
function mostrar($articulos) {
    foreach ($articulos as $articulo) {
        echo "Código: " . $articulo["codigo"] . "\n";
        echo "Descripción: " . $articulo["descripcion"] . "\n";
        echo "Existencias: " . $articulo["existencias"] . "\n\n";
    }
}

// Código auxiliar para probar las funciones
echo "El artículo con mayor existencias es: " . mayor($articulos) . "\n";
echo "<br>El total de existencias es: " . sumar($articulos) . "\n";
echo "<br>Contenido del array de artículos:\n";
mostrar($articulos);
?>


</body>
</html>