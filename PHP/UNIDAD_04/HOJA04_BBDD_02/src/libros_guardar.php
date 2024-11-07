<?php
require 'funcionesBD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $anyo_edicion = $_POST['anyo_edicion'];
    $precio = $_POST['precio'];
    $fecha_adquisicion = $_POST['fecha_adquisicion'];

    // Validación de la fecha en formato dd/mm/aaaa
    $fecha_parts = explode('/', $fecha_adquisicion);
    if (count($fecha_parts) === 3) {
        list($dia, $mes, $ano) = $fecha_parts;
        if (checkdate($mes, $dia, $ano)) {
            $fechaSQL = "$ano-$mes-$dia"; // Formato para SQL: aaaa-mm-dd
            if (guardarLibro($titulo, $anyo_edicion, $precio, $fechaSQL)) {
                echo "Datos guardados correctamente";
            } else {
                echo "Error al guardar los datos";
            }
        } else {
            echo "Fecha de adquisición no es válida.";
        }
    } else {
        echo "Formato de fecha no válido. Use dd/mm/aaaa.";
    }
}
?>

<br><br>
<a href="libros.php">Volver a la página de libros</a>
