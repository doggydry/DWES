<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 16px;
        }

        .pelicula {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .pelicula img {
            width: 100px;
            /* Ajusta el tamaño de la imagen según necesites */
            height: auto;
            margin-right: 10px;
            align-items: center;
        }

        .resultados {
            background-color: #e7f3fe;
            padding: 10px;
            margin: 20px 0;
        }

    </style>
</head>

<body>
    <?php

    if (isset($_POST['buscador'])) {
        $buscador = strtolower(trim($_POST['buscador']));
        $resultados = [];
        $peliculas = ['It', 'El Joker', 'El Hoyo', 'Colision', '300', 'La vida de Pi', 'El Francotirador', 'La marea', 'Once', 'Duel'];
        $imagenes = [
            'https://ichef.bbci.co.uk/ace/ws/640/cpsprodpb/66D3/production/_98032362_mediaitem98014584.jpg.webp',
            'https://es.web.img3.acsta.net/pictures/19/09/17/17/03/5442885.jpg',
            'https://estaticosgn-cdn.deia.eus/clip/fdbfe779-1817-4a24-849e-4040a6f760d7_16-9-aspect-ratio_default_0.jpg',
            'https://pics.filmaffinity.com/Colisiaon-480016043-large.jpg',
            'https://images-3.rakuten.tv/storage/snapshot/shot/97def6d4-1906-4b38-b937-094137d4afcc.jpeg',
            'https://es.web.img3.acsta.net/medias/nmedia/18/92/99/86/20312878.jpg',
            'https://m.media-amazon.com/images/I/81ATZLQjOHL._AC_UF894,1000_QL80_.jpg',
            'https://pics.filmaffinity.com/La_marea-778547600-large.jpg',
            'https://pics.filmaffinity.com/Once_Una_vez-308903659-large.jpg',
            'https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Surviving_Duel_truck_cine.jpg/250px-Surviving_Duel_truck_cine.jpg'
        ];

        /**
         * Filtrar las peliculas que coincidan con la busqueda
         */

        foreach ($peliculas as  $index => $pelicula) {
            if (stripos($pelicula, $buscador) !== false) {
                $resultados[] = ['titulo' => $pelicula, 'imagen' => $imagenes[$index]];
            }
        }

        if (!empty($resultados)) {
            echo "<div class='resultados'>";
            echo "<h2>" . count($resultados) . " películas encontradas para la búsqueda \"$buscador\"</h2>";
            foreach ($resultados as $resultado) {
                echo "<div class='pelicula'>";
                echo "<img src='" . $resultado['imagen'] . "' alt='" . $resultado['titulo'] . "'>";
                echo "<span>" . $resultado['titulo'] . "</span>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p>No se encontraron resultados para <strong>$buscador</strong>.</p>";
        }
    }
    ?>
</body>

</html>