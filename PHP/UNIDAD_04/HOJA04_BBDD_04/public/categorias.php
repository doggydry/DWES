<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use Supermercado\Clases\ConexionBD;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Categorias</title>
</head>

<body class="container">
    <h1>Categorias</h1>
    <?php
    $categorias = ConexionBD::getCategorias();
    ?>
    <hr>
    <form action="categorias.php" method="post">
        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria">
            <option value="1" disabled selected>Seleccione la categoria</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value=<?php echo $categoria->getNombre() ?> <?php  if (isset($_POST['categoria'])) echo $_POST['categoria']===$categoria->getNombre() ? 'selected' : '' ?>> <?php echo $categoria->getNombre() ?> </option>

            <?php endforeach; ?>
        </select>
        <input type="submit" name="mostrar" value="Mostrar">
    </form>
    
    <?php if (isset($_POST['categoria'])): 
        $productos = ConexionBD::getProductos();
        $categoria = $_POST['categoria'];
        $productosSeleccionados = array_filter($productos,function($producto) use($categoria){return $producto->getCategoria()->getNombre()===$categoria;})
    ?>
    <h3>Productos</h3>
    <table>
        <tr>
            <td>Precio</td>
            <td>Nombre</td>
            <td>Categoria</td>
        </tr>
       <?php foreach ($productosSeleccionados as $productoSeleccionado):?>
        <tr>
        <td><?php echo $productoSeleccionado->getPrecio()?> </td>
        <td><?php echo $productoSeleccionado->getNombre()?> </td>
        <td><?php echo $productoSeleccionado->getCategoria()->getNombre()?> </td>
    </tr>
    <?php endforeach;?>
    <?php endif;?>
    </table>
</body>
</html>