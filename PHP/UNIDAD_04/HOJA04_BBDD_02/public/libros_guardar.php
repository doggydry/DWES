<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use Libros\Clases\FuuncionesBD;
use Libros\Clases\ConexionBD;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Guardar Libros</title>
</head>

<body class="container">
    <div class="resultado">
        <?php if (isset($_POST['titulo'], $_POST['anyo_edicion'], $_POST['precio'], $_POST['fecha_adquisicion'])) {
            $conexion = ConexionBD::getConexion();

            if (!$conexion) {
                echo "Error: No se pudo establecer la conexión a la base de datos.";
                exit;
            }
            if ($conexion instanceof PDO) {
                try {
                    $query = "INSERT INTO libros (titulo, anyo_edicion, precio, fecha_adquisicion) VALUES (?, ?, ?, ?)";
                    $stmt = $conexion->prepare($query);

                    $stmt->execute([$_POST['titulo'], $_POST['anyo_edicion'], $_POST['precio'], $_POST['fecha_adquisicion']]);

                    echo '<h1>¡Datos insertados correctamente!</h2';
                } catch (PDOException $e) {
                    echo "Error en la insercción: " . $e->getMessage();
                }
            }
        }
        ?>
        <a href="PHP\UNIDAD_04\HOJA04_BBDD_02\public\index.php">Volver</a>
    </div>
</body>

</html>