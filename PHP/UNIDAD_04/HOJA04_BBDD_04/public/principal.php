<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use Supermercado\Clases\ConexionBD;

$productos = ConexionBD::getProductos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Productos</title>
</head>
<body class="container">
<h1>Productos</h1>
<hr>
<table>
    <tr>
    <td>Precio</td>
    <td>Nombre</td>
    <td>Categoria</td>
    </tr>
    <?php foreach ($productos as $producto):?>
    <tr>
        <td><?php echo $producto['precio']?> </td>
        <td><?php echo $producto['nombre']?> </td>
        <td><?php echo $producto['categoria_id']?> </td>
    </tr>
    <?php endforeach;?>
</table>
</body>
</html>