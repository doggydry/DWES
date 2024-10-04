<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    include 'Producto.php'; 

    /**
     * Creamnos un array (cesta) para almacenar los productos
     */
    $cestaCompra = [];

    /**
     * Agregamos productos de alimentacion a la cesta
     */
    $cestaCompra[] = new Alimentacion("001", 1.50, "Leche", 12, 2024);
    $cestaCompra[] = new Alimentacion("002", 0.80, "Pan", 10, 2024);

    /**
     * Agregramos productos de electronica a la cesta
     */
    $cestaCompra[] = new Electronica("003", 199.99, "Televisor", 24);
    $cestaCompra[] = new Electronica("004", 59.99, "Auriculares", 12);

    /**
     * Mostrar los datos de cada producto
     * y con ello calcular el importe total
     */
    $importeTotal = 0;
    $gastoAlimentacion = 0;
    $gastoElectronica = 0;

    echo "DATOS DE LA COMPRA:<br>";
    foreach ($cestaCompra as $producto) {
        echo $producto->mostrar() . "<br>";
        $importeTotal += $producto->getPrecio();

        /**
         * Con esto controlamos el gasto por cada tipo de alimento
         */
        if ($producto instanceof Alimentacion) {
            $gastoAlimentacion += $producto->getPrecio();
        } elseif ($producto instanceof Electronica) {
            $gastoElectronica += $producto->getPrecio();
        }
    }

    /**
     * Con esto mostramos el importe total y 
     * el tipo de producto con mayor gasto
     */
    echo "IMPORTE TOTAL: $importeTotal €<br>";
    if ($gastoAlimentacion > $gastoElectronica) {
        echo "Te has gastado más en Alimentación: $gastoAlimentacion €<br>";
    } elseif ($gastoElectronica > $gastoAlimentacion) {
        echo "Te has gastado más en Electrónica: $gastoElectronica €<br>";
    } else {
        echo "Te has gastado lo mismo en Alimentación que en Electrónica: $gastoAlimentacion € cada uno.<br>";
    }

    ?>
</body>

</html>