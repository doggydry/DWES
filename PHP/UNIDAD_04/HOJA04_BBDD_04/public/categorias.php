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
    $categorias = ConexionBD::mostrarCategoria();
    ?>
    <hr>
    <form action="categorias.php" method="post">
        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria">
            <option value="1" disabled selected>Seleccione la categoria</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria ?>"> <?php ?></option>  
            <?php endforeach; ?>
            <option value=<?php echo $nombre_equipo ?> <?php  if (isset($_POST['equipo'])) echo $_POST['equipo']===$nombre_equipo ? 'selected' : '' ?>> <?php echo $nombre_equipo ?> </option>

        </select>
        <input type="submit" name="mostrar" value="Mostrar">
    </form>
    
    <?php if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {
        $productos = ConexionBD::mostrarProductosDeCategoria($_POST['categoria']);
    } 
    ?>
    <h3>Productos</h3>
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