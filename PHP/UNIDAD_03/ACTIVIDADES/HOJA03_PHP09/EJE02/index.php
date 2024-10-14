<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if (isset($_POST['buscador'])) {
        $buscador = strtolower(trim($_POST['buscador']));
        $resultados = [];
        $peliculas = ['It', 'El Joker', 'El Hoyo', 'Colision', '300', 'La vida de Pi', 'El Francotirador', 'La marea', 'Once', 'Duel'];

        /**
         * Filtrar las peliculas que coincidan con la busqueda
         */

        foreach ($peliculas as $pelicula) {
            if (stripos($pelicula, $buscador) !== false) {
                $resultados[] = $pelicula;
            }
        }

        if (!empty($resultados)) {
            echo "<h2>Resultados: </h2><ul>";
            foreach ($resultados as $resultado) {
                echo "<li>$resultado</li>";
            }
            echo "</ul>";
        } else {
            echo "<p> No se encontraron resultados para <strong>$buscador</strong>.</p>";
        }
    }



    ?>
</body>

</html>