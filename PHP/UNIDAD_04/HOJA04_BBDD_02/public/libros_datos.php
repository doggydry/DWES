<?php
require_once dirname(__DIR__) . "/vendor/autoload.php";

use Libros\Clases\FuuncionesBD;

$libros = FuuncionesBD::getDatosLibros();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Datos Libros</title>
</head>
<body class="container">

<table>
    <tr>
        <th>Titulo</th>
        <th>Año de Edicion</th>
        <th>Precio</th>
        <th>Fecha de Aquisicion</th>
    </tr>
    <?php foreach ($libros as $libro): ?>
        <tr>
            <td><?php echo $libro['titulo'];?></td>
            <td><?php echo $libro['anyo_edicion'];?></td>
            <td><?php echo $libro['precio'];?></td>
            <td><?php echo $libro['fecha_adquisicion'];?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>